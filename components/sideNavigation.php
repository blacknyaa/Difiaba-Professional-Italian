<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Menu</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="dashboard.php"
                        aria-expanded="false">
                        <i class="mdi mdi-gauge"></i>
                        <span class="hide-menu">Dashboard </span>
                    </a>
                    
                </li>
                
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">Clients</span>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="clients.php" aria-expanded="false">
                                <i class="mdi mdi-account"></i>
                                <span class="hide-menu">Clients</span></a>
                        </li>

                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">Appointments</span>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pending.php" aria-expanded="false">
                                <i class="mdi mdi-clock"></i>
                                <span class="hide-menu">Pending</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="approved.php" aria-expanded="false">
                                <i class="mdi mdi-check-circle-outline"></i>
                                <span class="hide-menu">Approved</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="rejected.php" aria-expanded="false">
                                <i class="mdi mdi-bookmark-remove"></i>
                                <span class="hide-menu">Rejected</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="completed.php" aria-expanded="false">
                                <i class="mdi mdi-checkbox-multiple-marked-circle"></i>
                                <span class="hide-menu">Completed</span></a>
                        </li>
                        
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">Services</span>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="services.php" aria-expanded="false">
                                <i class="mdi mdi-sitemap"></i>
                                <span class="hide-menu">Services</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false" hidden>
                                <i class="mdi mdi-folder"></i>
                                <span class="hide-menu">Patient Records </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="records.php" class="sidebar-link"><i
                                            class="mdi mdi-book-plus"></i><span class="hide-menu">Records
                                        </span></a></li>
                            </ul>
                        </li>

                
                <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Account</span></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="../backend/logout.php" id="logout" aria-expanded="false"><i
                            class="mdi mdi-logout"></i><span class="hide-menu">Log Out</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    
    <!-- End Bottom points-->
    
</aside>
<script type="module">
    import { getAuth, signOut } from "https://www.gstatic.com/firebasejs/10.11.1/firebase-auth.js";

    document.addEventListener('DOMContentLoaded', function() {
        const auth = getAuth();

        const logoutButton = document.getElementById('logout');

        logoutButton.addEventListener('click', function(event) {
            event.preventDefault(); 

            // Sign out the user
            signOut(auth).then(() => {
                console.log('User signed out');
                localStorage.clear();
                window.location.href = '../index.php';
            }).catch((error) => {
                console.error('Error signing out:', error);
            });
        });
    });
</script>