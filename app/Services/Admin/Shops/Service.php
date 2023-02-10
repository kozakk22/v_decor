<?php

namespace App\Services\Admin\Shops;

use App\Models\Shop;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function update($data, $shop)
    {
        try {
            if(!isset($data['logo'])) {
                $data['logo'] = $shop->logo;
            }
            else {
                $data['logo'] = Storage::disk('public')->put('/logo', $data['logo']);
                Storage::disk('public')->delete($shop->logo);
            }
            $shop->update($data);
        }
        catch (\Exception $exception) {
            abort('404');

        }
    }
}
