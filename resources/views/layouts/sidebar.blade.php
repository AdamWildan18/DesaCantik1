 <!-- sidebar  -->
 <nav class="sidebar dark_sidebar">
     <div class="logo d-flex justify-content-between">
        <img src="../img/DesaCintaStatistik.png" style="width: 230px">
        <hr>
         <div class="sidebar_close_icon d-lg-none">
             <i class="ti-close"></i>
         </div>
     </div>
     <ul id="sidebar_menu">
         <li>
             <a href="/" aria-expanded="false">
                 <div class="nav_icon_small">
                     <img src="/img/menu-icon/dashboard.svg" alt="">
                 </div>
                 <div class="nav_title">
                     <span>Home</span>
                 </div>
             </a>
         </li>

         <li>
             <a href="/keluarga" aria-expanded="false">
                 <div class="nav_icon_small">
                    <i class="bi bi-people"></i>
                 </div>
                 <div class="nav_title">
                     <span>Keterangan Keluarga</span>
                 </div>
             </a>
         </li>
         <li>
             <a href="/rumah" aria-expanded="false">
                 <div class="nav_icon_small">
                    <i class="bi bi-house-exclamation"></i>
                 </div>
                 <div class="nav_title">
                     <span>Keterangan Prumahan</span>
                 </div>
             </a>
         </li>
         <li>
            <a href="/penduduk" class="nav-link" aria-expanded="false">
                <div class="nav_icon_small">
                    <i class="bi bi-person"></i>
                </div>
                <div class="nav_title">
                    <span>Keterangan Demografi</span>
                </div>
            </a>
        </li>
         <li>
             <a href="/pendidikan" aria-expanded="false">
                 <div class="nav_icon_small">
                    <i class="bi bi-brush"></i>
                 </div>
                 <div class="nav_title">
                     <span>Pendidikan</span>
                 </div>
             </a>
         </li>
         <li>
             <a href="/pekerjaan" aria-expanded="false">
                 <div class="nav_icon_small">
                    <i class="bi bi-briefcase-fill"></i>
                 </div>
                 <div class="nav_title">
                     <span>Keterangan ketenagakerjaan</span>
                 </div>
             </a>
         </li>
         <li>
             <a href="/usaha" aria-expanded="false">
                 <div class="nav_icon_small">
                    <i class="bi bi-server"></i>
                 </div>
                 <div class="nav_title">
                     <span>Keterangan Usaha</span>
                 </div>
             </a>
         </li>
         <li>
             <a href="/kesehatan" aria-expanded="false">
                 <div class="nav_icon_small">
                    <i class="bi bi-heart-pulse-fill"></i>
                 </div>
                 <div class="nav_title">
                     <span>Keterangan Kesehatan</span>
                 </div>
             </a>
         </li>
         <li>
             <a href="/sosial" aria-expanded="false">
                 <div class="nav_icon_small">
                    <i class="bi bi-file-medical-fill"></i>
                 </div>
                 <div class="nav_title">
                     <span>Keterangan Program Perlindungan Sosial</span>
                 </div>
             </a>
         </li>
         <li>
             <a href="/program" aria-expanded="false">
                 <div class="nav_icon_small">
                    <i class="bi bi-file-earmark"></i>
                 </div>
                 <div class="nav_title">
                     <span>Program, Aset, dan Layanan</span>
                 </div>
             </a>
         </li>
        @guest
        @else
         <h4 class="menu-text"><span>Form Pendataan</span> <i class="fas fa-ellipsis-h"></i> </h4>
         <li>
             <a href="/keluarga/create" aria-expanded="false">
                 <div class="nav_icon_small">
                    <i class="bi bi-ui-checks"></i>
                 </div>
                 <div class="nav_title">
                     <span>Form</span>
                 </div>
             </a>
         </li>
         <li>
             <a href="/verif" aria-expanded="false">
                 <div class="nav_icon_small">
                    <i class="bi bi-ui-checks"></i>
                 </div>
                 <div class="nav_title">
                     <span>Verifikasi Data</span>
                 </div>
             </a>
         </li>
         @if (auth()->user()->role === 'superadmin')
         <h4 class="menu-text"><span>Hak Askes</span> <i class="fas fa-ellipsis-h"></i> </h4>
         <li>
            <a href="/akses" aria-expanded="false">
                <div class="nav_icon_small">
                   <i class="bi bi-ui-checks"></i>
                </div>
                <div class="nav_title">
                    <span>Hak Akses</span>
                </div>
            </a>
        </li>
         @elseif(auth()->user()->role === 'admin')
         <h4 class="menu-text"><span>Hak Askes</span> <i class="fas fa-ellipsis-h"></i> </h4>
         <li>
            <a href="/akses" aria-expanded="false">
                <div class="nav_icon_small">
                   <i class="bi bi-ui-checks"></i>
                </div>
                <div class="nav_title">
                    <span>Hak Akses</span>
                </div>
            </a>
        </li>
        @endif
        
        @if (auth()->user()->role === 'superadmin')
        <h4 class="menu-text"><span>Program Bantuan</span> <i class="fas fa-ellipsis-h"></i> </h4>
        <li>
            <a href="/bantuan" aria-expanded="false">
                <div class="nav_icon_small">
                    <i class="bi bi-ui-checks"></i>
                </div>
                <div class="nav_title">
                    <span>Program Bantuan</span>
                </div>
            </a>
        </li>
        @endif
        @endguest
     </ul>
 </nav>
 <!--/ sidebar  -->
