<section class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <img src="{{ asset('img/logo.jpeg') }}" alt="CHON" style="width: 150px">
            </div>
            <div>
                <span>Güncel Kur: </span><span id="guncel_kur" v-text="currentExchange"></span>
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg" style="width: fit-content;">
                <form action="">
                    <input type="text" name="search" placeholder="Ürün Ara"
                        style="height: 3rem;line-height:3rem;font-size:2rem;">
                    <button>ARA</button>
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
                            <td>@{{ format(product.buying_time) }}</td>
                            <td>@{{ format(product.updated_at) }}</td>
                            <td>@{{ product.buying_price }}</td>
                            <td>@{{ product.buying_exchange + "$" }}</td>
                            <td>@{{ product.buying_price * product.buying_exchange + "₺" }}</td>
                            <td style="font-weight: bolder;color:chocolate;">@{{ (product.buying_price * currentExchange).toFixed(2) + "₺" }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>
