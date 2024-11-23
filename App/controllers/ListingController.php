<?php


namespace App\Controllers;

use Framework\Database;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDO;

class ListingController
{
    protected $db;
    public function __construct()
    {
        $config = require basePath("config/db.php");
        $this->db = new Database($config);
    }


    public function index()
    {
        $listings = $this->db->query("SELECT * FROM listings LIMIT 6")->fetchAll(PDO::FETCH_OBJ);
        loadView('home', ['listings' => $listings]);
    }


    public function create()
    {
        loadView('listings/create');
    }

    public function show()
    {
        $id = $_GET['id'] ?? '';

        $params = [
            'id' => $id
        ];

        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

        loadView('listings/show', [
            'listing' => $listing
        ]);
    }
}
