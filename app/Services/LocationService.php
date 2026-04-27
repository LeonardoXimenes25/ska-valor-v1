<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class LocationService
{
    /**
     * Mengambil semua data dari file JSON
     */
    public function getAllData()
    {
        $path = resource_path('data/timor_leste.json');
        
        if (!File::exists($path)) {
            return [];
        }

        return json_decode(File::get($path), true);
    }

    /**
     * Hanya mengambil daftar nama Munisipiu
     */
    public function getMunicipalities()
    {
        $data = $this->getAllData();
        return array_keys($data);
    }

    
    /**
     * Hanya mengambil daftar nama Posto Administrativu
    */
    public function getAdministrativePosts()
    {
        $data = $this->getAllData();
        return array_keys($data);
        }
        
        /**
         * Hanya mengambil daftar nama Suku
        */
        public function getTribes()
        {
        $data = $this->getAllData();
        return array_keys($data);
        }

        /**
         * Hanya mengambil daftar nama Aldeia
         */
        public function getVillages()
        {
            $data = $this->getAllData();
            return array_keys($data);
        }
}