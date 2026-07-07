@extends('costumer.layouts.master')

@section('content')
<section class="main-hero">
    <div class="hero-overlay">
        <h1>Hubungi Kami</h1>
        <p>
            Pertanyaan, reservasi katering, atau masukan berharga Anda sangat berarti.
        </p>
    </div>
</section>

<section class="contact-section">

    <!-- MAP -->
    <div class="map-area">
        <div id="map"></div>
    </div>

    <!-- CONTACT -->
    <div class="contact-card">

        <h2>Informasi Kontak</h2>

        <p class="desc">
            Tim pelayanan pelanggan kami siap mendengarkan saran dan pertanyaan Anda kapan pun.
            Silakan hubungi kami melalui saluran berikut.
        </p>

        <!-- WhatsApp -->
        <a href="https://wa.me/6289542825683?text=Halo%20Admin%20Restoranku%20%F0%9F%91%8B%0A%0ASaya%20ingin%20melakukan%20pemesanan%20makanan.%0A%0ANama%3A%0AMenu%20yang%20dipesan%3A%0AJumlah%3A%0AAlamat%20Pengiriman%3A%0A%0ATerima%20kasih."
           target="_blank">

            <div class="contact-item">

                <div class="icon">
                    <i class="fa-brands fa-whatsapp"></i>
                </div>

                <div class="text">
                    <h3>Telepon / WhatsApp</h3>
                    <p>+62 895-4282-5683</p>
                    <small>Senin - Minggu | 10.00 - 22.00</small>
                </div>

            </div>

        </a>

        <!-- Email -->
        <a href="mailto:restoranku@gmail.com">

            <div class="contact-item">

                <div class="icon">
                    <i class="fa-solid fa-envelope"></i>
                </div>

                <div class="text">
                    <h3>Email Resmi</h3>
                    <p>restoranku@gmail.com</p>
                    <small>Untuk proposal kerja sama / katering</small>
                </div>

            </div>

        </a>

        <!-- Alamat -->
        <a href="https://maps.app.goo.gl/bU3ae8HK7KDLeXTx7"
           target="_blank">

            <div class="contact-item">

                <div class="icon">
                    <i class="fa-solid fa-location-dot"></i>
                </div>

                <div class="text">
                    <h3>Alamat Restoran</h3>
                    <p>
                        Jl. Perum Prasmanan Unud No.88,<br>
                        Jimbaran, Kabupaten Badung, Bali 80361
                    </p>
                </div>

            </div>

        </a>

        <!-- Jam Operasional -->
        <div class="contact-item">

            <div class="icon">
                <i class="fa-solid fa-clock"></i>
            </div>

            <div class="text">
                <h3>Jam Operasional</h3>
                <p>Setiap Hari 10.00 - 22.00 WITA</p>
                <small>Dapur tutup pukul 21.30 WITA</small>
            </div>

        </div>

    </div>

</section>
@endsection

@push('styles')
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<link rel="stylesheet"
href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">

<style>
.main-hero{
    height:340px;
    background-image:url("hero.png");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    position:relative;
}

.hero-overlay{
    position:absolute;
    inset:0;
    background:rgba(0,0,0,.55);
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
}

.hero-overlay h1{
    color:white;
    font-size:52px;
    font-weight:700;
}

.hero-overlay p{
    color:#8BC34A;
    margin-top:15px;
    font-size:18px;
}

.contact-section{
    width: 90%;
    margin: 70px auto;
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    align-items: stretch;
}

.map-area{
    flex: 2;
    min-width: 450px;

    background: #fff;
    padding: 12px;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0,0,0,.08);
}

#map{
    width:100%;
    height:100%;
    min-height:550px;
    border-radius:15px;
}

.contact-card{
    flex: 1;
    min-width: 330px;

    background: white;
    padding: 35px;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0,0,0,.08);
}

.contact-card h2{
    font-size:30px;
    margin-bottom:15px;
}

.desc{
    color:#777;
    line-height:1.8;
    margin-bottom:30px;
}


.contact-card a{
    text-decoration:none;
    color:inherit;
}

.contact-item{
    display:flex;
    align-items:flex-start;
    gap:15px;
    padding:18px;
    border:1px solid #ededed;
    border-radius:15px;
    margin-bottom:18px;
    transition:.3s;
    cursor:pointer;
    background:white;
}

.contact-item:hover{
    transform:translateY(-5px);
    box-shadow:0 10px 20px rgba(0,0,0,.08);
}

.icon{
    width:52px;
    height:52px;
    border-radius:12px;
    background:#eef8e6;
    color:#7CB342;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:22px;
    flex-shrink:0;
}

.text h3{
    font-size:17px;
    margin-bottom:6px;
}

.text p{
    color:#444;
    margin-bottom:4px;
}

.text small{
    color:orange;
}

@media(max-width:992px){
.contact-section{

    flex-direction:column;

}

.hero-overlay h1{
font-size:42px;
}

}

@media(max-width:576px){
.hero-overlay h1{
font-size:34px;
}

.hero-overlay p{
text-align:center;
padding:0 20px;
font-size:15px;
}

#map{
height:350px;
}
.map-area,
.contact-card{

    width:100%;
    min-width:100%;

}
.contact-card{
padding:25px;
}
}
</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const map = L.map('map').setView([-8.797988558475616, 115.17177018465593], 16);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap'
    }).addTo(map);

    const marker = L.marker([
        -8.797988558475616,
        115.17177018465593
    ]).addTo(map);

    marker.bindPopup("<b>Restoranku</b><br>Jimbaran, Bali");

    marker.on('click', function () {
        window.open(
            'https://maps.app.goo.gl/bU3ae8HK7KDLeXTx7',
            '_blank'
        );
    });

});
</script>
@endpush