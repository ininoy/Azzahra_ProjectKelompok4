<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
    rel="stylesheet">

<style>
    :root {
        --inno-pink: #e91e63;
        --inno-purple: #7c3aed;
        --inno-gold-btn: #c5a373;
        --inno-text: #1f2937;
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #ffffff;
        color: var(--inno-text);
    }

    /* Navbar Atas */
    .navbar-inno {
        background: #ffffff;
        padding: 16px 0;
        border-bottom: 1px solid #f3f4f6;
    }

    .brand-circle {
        width: 34px;
        height: 34px;
        background: linear-gradient(135deg, #8b5cf6, #6d28d9);
        color: #fff;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-style: italic;
        font-size: 16px;
    }

    .brand-text {
        font-weight: 700;
        font-size: 21px;
        color: #111827;
        letter-spacing: -0.5px;
    }

    .nav-link-inno {
        color: #374151 !important;
        font-size: 14px;
        font-weight: 500;
        padding: 8px 14px !important;
        position: relative;
    }

    .nav-link-inno:hover {
        color: #000 !important;
    }

    /* Dropdown Menu Hover (Pakaian wanita & User Masuk/Daftar) */
    .dropdown-hover:hover .dropdown-menu {
        display: block;
        margin-top: 0;
    }

    .dropdown-menu-inno {
        border: none;
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        padding: 10px 0;
        min-width: 150px;
    }

    .dropdown-menu-inno .dropdown-item {
        font-size: 13.5px;
        padding: 8px 20px;
        color: #4b5563;
    }

    .dropdown-menu-inno .dropdown-item:hover {
        background-color: #f9fafb;
        color: #111827;
    }

    /* Ikon Kanan & Badge Pink */
    .nav-icon-btn {
        background: none;
        border: none;
        color: #1f2937;
        font-size: 20px;
        position: relative;
        padding: 4px 8px;
        cursor: pointer;
    }

    .badge-pink {
        position: absolute;
        top: 0;
        right: 0;
        background-color: var(--inno-pink);
        color: #fff;
        font-size: 10px;
        font-weight: 600;
        width: 17px;
        height: 17px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Hero Banner Beige Mewah */
    .hero-inno {
        position: relative;
        border-radius: 6px;
        overflow: hidden;
        height: 460px;
        background: linear-gradient(90deg, #cbb397 0%, #dfd0be 50%, #e9dfd3 100%);
        background-image: url('https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=1400&q=80');
        background-size: cover;
        background-position: center right;
        display: flex;
        align-items: center;
    }

    .hero-overlay {
        background: linear-gradient(90deg, rgba(168, 138, 105, 0.85) 0%, rgba(168, 138, 105, 0.35) 60%, rgba(255, 255, 255, 0) 100%);
        position: absolute;
        inset: 0;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 540px;
        padding-left: 60px;
        color: #fff;
    }

    .hero-title {
        font-size: 2.3rem;
        font-weight: 700;
        line-height: 1.25;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
    }

    .hero-subtitle {
        font-size: 0.95rem;
        opacity: 0.95;
        margin: 16px 0 26px;
        line-height: 1.6;
    }

    .btn-inno-gold {
        background-color: var(--inno-gold-btn);
        color: #fff;
        border: none;
        padding: 10px 24px;
        font-size: 13.5px;
        font-weight: 600;
        border-radius: 4px;
        transition: 0.2s;
    }

    .btn-inno-gold:hover {
        background-color: #b39060;
        color: #fff;
    }

    .hero-dots {
        position: absolute;
        bottom: 18px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 8px;
        z-index: 2;
    }

    .hero-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
    }

    .hero-dot.active {
        background: var(--inno-pink);
    }

    /* Section Title */
    .section-title-inno {
        text-align: center;
        font-size: 1.55rem;
        font-weight: 600;
        color: #111827;
        margin: 55px 0 32px;
    }

    /* Product Card & Efek Hover Persis Gambar 2 */
    .product-item-inno {
        background: #fff;
        border-radius: 8px;
        padding-bottom: 16px;
        transition: all 0.25s ease;
        text-align: center;
    }

    .product-item-inno:hover {
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        transform: translateY(-3px);
    }

    .product-img-wrap {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        aspect-ratio: 3/4;
        background: #f3f4f6;
        margin-bottom: 12px;
    }

    .product-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .product-item-inno:hover .product-img-wrap img {
        transform: scale(1.03);
    }

    /* Badge "Tambahkan ke favorit" muncul saat hover */
    .btn-fav-hover {
        position: absolute;
        top: 10px;
        left: 10px;
        background: rgba(31, 41, 55, 0.72);
        color: #fff;
        font-size: 11px;
        padding: 5px 10px;
        border-radius: 4px;
        border: none;
        opacity: 0;
        transition: opacity 0.25s ease;
    }

    .product-item-inno:hover .btn-fav-hover {
        opacity: 1;
    }

    .product-name-inno {
        font-size: 13px;
        color: #374151;
        font-weight: 500;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        padding: 0 12px;
        margin-bottom: 6px;
    }

    .product-price-old {
        color: #9ca3af;
        text-decoration: line-through;
        font-size: 12.5px;
        margin-right: 6px;
    }

    .product-price-now {
        color: var(--inno-pink);
        font-weight: 700;
        font-size: 13.5px;
    }

    /* Link "Tambahkan ke keranjang" pink bergaris bawah muncul saat hover */
    .add-cart-hover {
        display: inline-block;
        margin-top: 8px;
        color: var(--inno-pink);
        font-size: 12.5px;
        font-weight: 600;
        text-decoration: underline;
        text-underline-offset: 4px;
        opacity: 0;
        transition: opacity 0.25s ease;
        cursor: pointer;
    }

    .product-item-inno:hover .add-cart-hover {
        opacity: 1;
    }

    /* Drawer Keranjang Belanja Kanan */
    .btn-pink-inno {
        background-color: var(--inno-pink);
        color: #fff;
        border: none;
        padding: 8px 20px;
        font-size: 13px;
        font-weight: 600;
        border-radius: 4px;
    }

    .btn-pink-inno:hover {
        background-color: #d81b60;
        color: #fff;
    }
</style>
