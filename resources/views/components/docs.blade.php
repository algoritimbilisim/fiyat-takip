<section class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex pt-8 sm:justify-start sm:pt-0" style="align-items: center; justify-content:space-between;">
                <img src="{{ asset('img/logo.jpeg?v=' . env('ASSET_VERSION')) }}" alt="CHON" style="width: 150px">
                <div>
                    <h1>Güncel Kur</h1>
                    <h2 id="guncel_kur" style="text-align: center;" v-text="currentExchange"></h2>
                </div>
                @auth
                    <div class="flex">
                        <form action="/admin/logout" method="POST">
                            @csrf
                            <button type="submit" class="button button-danger button-right">
                                Çıkış
                            </button>
                        </form>
                        <a href="/admin" class="button button-secondary button-left">Admin</a>
                    </div>
                @endauth

                @guest
                    <a href="/admin" class="button button-danger">GİRİŞ</a>
                @endguest
            </div>



            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg"
                style="width: fit-content;">
                <form action="">
                    <input type="text" name="search" placeholder="Ürün Ara"
                        style="height: 3rem;line-height:3rem;font-size:2rem;">
                    <button class="button button-primary button-right">ARA</button>
                </form>
            </div>
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Başlık</th>
                            <th>Alış Zamanı</th>
                            <th>Güncelleme Zamanı</th>
                            <th>Alış Fiyatı<br>($)</th>
                            <th>Alış Kuru</th>
                            <th>Alış Fiyatı<br>(₺)</th>
                            <th>Satış Fiyatı</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="product in products">
                            <td>@{{ product.title }}</td>
                            @auth
                                <td>@{{ format(product.buying_time) }}</td>
                                <td>@{{ format(product.updated_at) }}</td>
                                <td>@{{ product.buying_price }}</td>
                                <td>@{{ product.buying_exchange + "$" }}</td>
                                <td>@{{ product.buying_price * product.buying_exchange + "₺" }}</td>
                                <td style="font-weight: bolder;color:chocolate;">@{{ (product.buying_price * currentExchange).toFixed(2) + "₺" }}</td>
                            @endauth
                            @guest
                                <td colspan="6" style="color:red;text-align:center;">Bu veriye erişiminiz yok</td>
                            @endguest
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>
