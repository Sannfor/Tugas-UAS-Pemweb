<?php

namespace App\Modules\Berita\Controllers;

use App\Controllers\BaseController;
use App\Modules\Berita\Models\BeritaModel;

class Berita extends BaseController
{
    protected $beritaModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
    }

    public function index()
    {
        $berita = $this->beritaModel
            ->orderBy('created_at', 'DESC')
            ->findAll(5);

        $data = [
            'beritaUtama'   => array_slice($berita, 0, 3),
            'beritaSamping' => array_slice($berita, 3, 2),
        ];

        return view('App\Modules\Berita\Views\v_index_berita', $data);
    }

    public function detail($slug)
{
    $beritaModel = new \App\Modules\Berita\Models\BeritaModel();

    $berita = $beritaModel
        ->where('slug', $slug)
        ->first();

    if (!$berita) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Berita tidak ditemukan');
    }

    return view(
        'App\Modules\Berita\Views\v_detail_berita',
        ['berita' => $berita]
    );
}
}