<!-- Custom styles -->
<link rel="stylesheet" href="{{asset('frontends/css/style.min.css')}}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@push('style.css')
    <style>
        .btn-logout {
            background: red;
            width: 100%;
            border: none;
            display: flex;
            flex-wrap: wrap;
            height: 30px;
            border-radius: 5px
        }

        .text-logout {
            color: white;
            line-height: 25px
        }

    </style>
@endpush