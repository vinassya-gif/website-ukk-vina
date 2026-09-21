<nav class="nav-wrapper">
    <div class="nav-container">
        <div class="nav-pill">

            {{-- Logo + Nama Sekolah + Tagline --}}
            <a href="{{ route('dashboard') }}" class="nav-brand">
                <x-application-logo />
                <div class="nav-brand-text">
                    <div class="nav-brand-title">SMK Negeri 1 Cijati</div>
                    <div class="nav-brand-tagline">"Kereund"</div> {{-- ganti tagline asli --}}
                </div>
            </a>

            {{-- Menu Desktop --}}
            <div class="nav-menu">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    Beranda
                </a>

                <div class="nav-dropdown">
                    <button class="nav-dropdown-btn">
                        Profil Sekolah
                        <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                    </button>
                    <div class="nav-dropdown-menu">
                        <a href="#">Sejarah</a>
                        <a href="#">Visi &amp; Misi</a>
                        <a href="#">Sambutan Kepala Sekolah</a>
                    </div>
                </div>

                <div class="nav-dropdown">
                    <button class="nav-dropdown-btn">
                        Informasi
                        <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                    </button>
                    <div class="nav-dropdown-menu">
                        <a href="#">Berita</a>
                        <a href="#">Pengumuman</a>
                    </div>
                </div>

                <a href="#" class="nav-link">Program Keahlian</a>
                <a href="#" class="nav-link">Ekstrakurikuler</a>
            </div>

            {{-- Kanan: auth / CTA --}}
            @auth
                <div class="nav-dropdown">
                    <button class="nav-user-btn" onclick="document.getElementById('userMenu').classList.toggle('open-user')">
                        {{ Auth::user()->name }}
                        <svg style="height:1rem;width:1rem;fill:currentColor;margin-left:0.25rem;" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                    </button>
                    <div id="userMenu" class="nav-dropdown-menu">
                        <a href="{{ route('profile.edit') }}">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="nav-cta">Hubungi Kami</a>
            @endauth

            {{-- Hamburger --}}
            <button class="nav-mobile-toggle" onclick="document.getElementById('mobileMenu').classList.toggle('open')">
                <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    <path d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        {{-- Menu Mobile --}}
        <div id="mobileMenu" class="nav-mobile-menu">
            <a href="{{ route('dashboard') }}">Beranda</a>
            <a href="#">Profil Sekolah</a>
            <a href="#">Informasi</a>
            <a href="#">Program Keahlian</a>
            <a href="#">Ekstrakurikuler</a>

            @auth
                <a href="{{ route('profile.edit') }}">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
                </form>
            @else
                <a href="{{ route('login') }}">Hubungi Kami</a>
            @endauth
        </div>
    </div>
</nav>