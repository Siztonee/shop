[//]: # (# installation)

[//]: # ()
[//]: # (- php artisan storage:link)

[//]: # (- composer require barryvdh/laravel-debugbar --dev)

[//]: # (- php artisan make:controller AppController)

[//]: # ()
[//]: # (# filter dev)

[//]: # ()
[//]: # (-To controller add this:)

[//]: # ()
[//]: # (    $brands = Brand::orderBy&#40;'name', 'ASC'&#41;->get&#40;&#41;;)

[//]: # (    $q_brands = $request->query&#40;'brands'&#41;;)

[//]: # (    )
[//]: # (    $products = Product::where&#40;function &#40;$query&#41; use&#40;$q_brands&#41; {)

[//]: # (        $query->whereIn&#40;'brand_id', explode&#40;',',$q_brands&#41;&#41;->orWhereRaw&#40;"'".$q_brands."'=''"&#41;;)

[//]: # (    }&#41;)

[//]: # (        ->orderBy&#40;$o_column, $o_order&#41;)

[//]: # (        ->paginate&#40;$size&#41;;)

[//]: # (    return view&#40;'shop', [)

[//]: # (        'brands' => $brands,)

[//]: # (        'q_brands' => $q_brands,)

[//]: # (    ]&#41;;)

[//]: # ()
[//]: # (-To blade add this:)

[//]: # ()
[//]: # (    <ul class="category-list">)

[//]: # ()
[//]: # (        @foreach&#40;$brands as $brand&#41;)

[//]: # (            <li>)

[//]: # (                <div class="form-check ps-0 custome-form-check">)

[//]: # (                    <input class="checkbox_animated check-it")

[//]: # (                           id="br{{ $brand->id }}" name="brands")

[//]: # (                           @if&#40;in_array&#40;$brand->id, explode&#40;',',$q_brands&#41;&#41;&#41; checked="checked")

[//]: # (                           @endif)

[//]: # (                           value="{{ $brand->id }}" type="checkbox")

[//]: # (                           onchange="filterProductsByBrand&#40;this&#41;">)

[//]: # (                    <label class="form-check-label">{{ $brand->name }}</label>)

[//]: # (                    <p class="font-light">&#40;{{ $brand->products->count&#40;&#41; }}&#41;</p>)

[//]: # (                </div>)

[//]: # (            </li>)

[//]: # (        @endforeach)

[//]: # ()
[//]: # (    </ul>)

[//]: # ()
[//]: # (<form id="frmFilter" action="" method="get">)

[//]: # (    <input type="hidden" id="brands" name="brands" value="{{ $q_brands }}">)

[//]: # (</form>)

[//]: # ()
[//]: # (@push&#40;'scripts'&#41;)

[//]: # (<script>)

[//]: # (    function filterProductsByCategory&#40;&#41; {)

[//]: # (            var categories = "";)

[//]: # (            $&#40;"input[name = 'categories']:checked"&#41;.each&#40;function &#40;&#41; {)

[//]: # (                if &#40;categories == ''&#41; {)

[//]: # (                    categories += this.value;)

[//]: # (                } else {)

[//]: # (                    categories += ',' + this.value;)

[//]: # (                })

[//]: # (            }&#41;;)

[//]: # (            $&#40;'#categories'&#41;.val&#40;categories&#41;;)

[//]: # (            $&#40;'#frmFilter'&#41;.submit&#40;&#41;;)

[//]: # (        })

[//]: # (    </script>)

[//]: # (@endpush)


