<?php

namespace App\Controllers;

use App\Models\TransactionModel;

class Pages extends BaseController
{
    public function index()
    {

        // Fetch data from the API
        $apiUrl = 'http://localhost:8080/api/books';

        $curl = curl_init($apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $apiData = json_decode(curl_exec($curl), true);
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        // Check if the request was successful (status code 200)
        if ($statusCode === 200) {
            $data = [
                'title' => 'Katalog | Book Shop',
                'books' => $apiData['book'], // Assuming the API returns an array of books
            ];
            return view('pages/katalog', $data);
        } else {
            // Handle the case where the API request was not successful
            die('Error fetching data from the API');
        }
    }
    public function about()
    {
        $data = [
            'title' => 'About | Book Shop',
        ];
        return view('pages/about', $data);
    }

    public function beli($id)
    {
        if (!session()->get('username')) {
            return redirect()->to('/login');
        }
        $apiUrl = 'http://localhost:8080/api/books';

        $curl = curl_init($apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $apiData = json_decode(curl_exec($curl), true);
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        // Check if the request was successful (status code 200)
        if ($statusCode === 200) {
            // Assuming $apiData['book'] is an array of books
            $filteredBook = array_filter($apiData['book'], function ($book) use ($id) {
                return $book['id'] == $id;
            });

            if (empty($filteredBook)) {
                die('Book not found'); // Handle the case where the book with the specified ID is not found
            }

            $book = reset($filteredBook); // Get the first element of the filtered array

            $data = [
                'title' => 'Beli | Book Shop',
                'book' => $book,
                'username' => session()->get('username'),
            ];

            return view('pages/beli', $data);
        } else {
            // Handle the case where the API request was not successful
            die('Error fetching data from the API');
        }
    }

    public function checkout()
    {
        // API URL for checking stock
        // Retrieve data from the POST request
        $id = $this->request->getPost('id');
        $title = $this->request->getPost('judul');
        $quantity = $this->request->getPost('quantity');
        $price = $this->request->getPost('harga');

        $apiUrl = 'http://localhost:8080/api/transaction';

        // Data to be sent in the API request
        $postData = [
            'id' => $id,
            'quantity' => $quantity,
        ];

        // Initialize cURL session
        $curl = curl_init($apiUrl);

        // Set cURL options
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

        // Execute cURL session
        $apiData = json_decode(curl_exec($curl), true);

        // Get HTTP status code
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        // Close cURL session
        curl_close($curl);

        // Check if the API request was successful (status code 200)
        if ($statusCode === 200) {
            // Assuming $apiData['book'] is an array of books
            

            // Assuming you have a TransactionModel with a method to insert a transaction
            $transactionModel = model(TransactionModel::class);

                // Insert a row into the transaction model
                $transactionModel->insert([
                    'tanggal' => date('Y-m-d'), // Assuming the date format is 'YYYY-MM-DD
                    'name' => $title,
                    'customer' => session()->get('username'),
                    'quantity' => $quantity,
                    'total_price' => $price * $quantity,
                ]);

                $data = [
                    'title' => 'Checkout | Book Shop',
                    'username' =>  session()->get('username'),
                    'nama' => $title,
                    'quantity' => $quantity,
                    'total_price' => $price * $quantity,
                ];

                return view('pages/checkout', $data);
            
                // Handle the case where there is not enough stock
                die('Not enough stock for checkout');
        }
         else {
            // Handle the case where the API request was not successful
            die('Error fetching data from the API');
        }
    }
}