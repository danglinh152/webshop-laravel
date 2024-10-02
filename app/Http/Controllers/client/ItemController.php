<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class ItemController extends Controller
{
    public function productDetailPage($product_id)
    {
        $get_product = DB::table('product')->where('product_id', $product_id)->where('status', 'show')->get();

        return view('client.product.detail')->with('get_product', $get_product);
    }


    public function getHomePage()
    {
        $all_product = DB::table('product')->where('status', 'show')->orderby('product_id', 'asc')->get();
        $manager_product = view('client.homepage.home')->with('all_product', $all_product);
        return view(view: 'client.layout.homepage-layout')->with('client.homepage.home', @$manager_product);
    }
    public function productShowPage(Request $request)
    {
        $factories = $request->input('factory', []);
        $targets = $request->input('target', []);
        $prices = $request->input('price', []);
        $sort = $request->input('radio-sort', 'gia-nothing');

        $query = DB::table('product');

        // Áp dụng bộ lọc cho factories
        if (!empty($factories)) {
            $query->whereIn('product_fact', $factories);
        }

        // Áp dụng bộ lọc cho targets
        if (!empty($targets)) {
            $query->whereIn('product_target', $targets);
        }

        // Áp dụng bộ lọc cho prices
        // Áp dụng bộ lọc cho prices
        if (!empty($prices)) {

            $product_prices = array();
            foreach ($prices as $price) {
                if ($price === '1015') {
                    $product_prices[] = 10000000;
                    $product_prices[] = 15000000;
                } elseif ($price === '1520') {
                    $product_prices[] = 15000000;
                    $product_prices[] = 20000000;
                } elseif ($price === '20') {
                    $product_prices[] = 20000000;
                    $product_prices[] = 9999999999999999999999999999;
                }
            }
            $min_value = $product_prices[0];
            $max_value = $product_prices[0];
            foreach ($product_prices as $product_price) {
                if ((int)$product_price === 9999999999999999999999999999) {
                    $min_value = 20000000;
                    $max_value = 9999999999999999999999999999;
                } else {
                    if ((int)$product_price < $min_value) {
                        $min_value = $product_price;
                    } else if ((int)$product_price > $max_value) {
                        $max_value = $product_price;
                    }
                }
            }
            $query->whereBetween('product_price', [$min_value, $max_value]);
        }


        // Áp dụng sắp xếp
        switch ($sort) {
            case 'gia-tang-dan':
                $query->orderBy('product_price', 'asc');
                break;
            case 'gia-giam-dan':
                $query->orderBy('product_price', 'desc');
                break;
            default:
                $query->orderBy('product_id', 'desc');
                break;
        }

        // Lấy sản phẩm
        $all_product = $query->where('status', 'show')->paginate(6);

        return view('client.product.show', [
            'all_product' => $all_product,
            'factories' => $factories,
            'targets' => $targets,
            'prices' => $prices,
            'sort' => $sort,
        ]);
    }
}
