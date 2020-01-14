<!-- Footer -->
<footer class="page-footer pt-4 font-small bg-dark" style="clear: both;">

    <!-- Footer Links -->
    <div class="container">

        <!-- Grid row-->
        @if(!Auth::check())
            <ul class="list-unstyled list-inline text-center py-2">
                <li class="list-inline-item">
                    <h5 class="mb-1">Creat a account for free</h5>
                </li>
                <li class="list-inline-item">
                    <a href="register" class="btn sign-btn">Sign up</a>
                </li>
            </ul>
        @endif
    </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2018 Copyright:
            <a >TUAN NGUYEN</a>
        </div>
        <!-- Copyright -->

</footer>
<!-- Footer -->