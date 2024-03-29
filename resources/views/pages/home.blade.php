<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>{{ setting('site.title') }}</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Health Care Medical Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Algoritim Informatics">
    <meta name="generator" content="Algoritim Informatics CHON HTML Template v1.0">

    <!-- theme meta -->
    <meta name="theme-name" content="chon" />

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/CHON_fav_comp.svg?v=' . env('ASSET_VERSION')) }}">
    @include('style')

    <style>
        .table thead th {
            vertical-align: middle !important;
        }
    </style>
</head>

<body id="top" class="{{ setting('site.theme') }}">
    <main id="app">
        @include('components.docs')
    </main>
    @stack('styles')
    @stack('scripts')

    <script>
        const {
            createApp
        } = Vue

        createApp({
            data() {
                return {
                    products: [],
                    currentExchange: 0
                }
            },
            mounted() {
                this.getCurrencyExchange();
                let productsData = @php echo json_encode($products, true); @endphp;
                productsData.data.forEach(product => {
                    this.products.push({
                        sellingPrice: product.buying_price * 22,
                        ...product
                    })
                });
            },
            methods: {
                format(date) {
                    const options = {
                        year: 'numeric',
                        month: 'numeric',
                        day: 'numeric'
                    };

                    return new Date(date).toLocaleDateString('tr-TR', options);
                },
                getCurrencyExchange() {
                    fetch("/api/currency-exchange") // API endpoint URL'sini belirtin
                        .then(response => response
                            .json()) // JSON formatında yanıtı almak için response'u parse edin
                        .then(data => {
                            this.currentExchange = data["USD"]["satis"];

                        }).catch(error => {
                            // Hata durumunda hata mesajını burada ele alabilirsiniz
                            console.error('Hata:', error);
                        })
                }
            }
        }).mount('#app');
    </script>
</body>

</html>
