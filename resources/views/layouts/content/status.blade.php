<div class="col-md-12 col-sm-12">
    <div class="d-flex flex-row status">
        <hr class="w-100 status-hr {{($active >= 1) ? 'active' : ''}}" />
        <a {{($active >= 1) ? "href=" . route('battles.create-step1') : ''}}>
            <div class="d-flex flex-column align-items-center">
                <div class="d-flex justify-content-center align-items-center text-white status-icon {{($active >= 1) ? 'active' : ''}}">
                    <i class="fas fa-gamepad ft-20"></i>
                </div>
                <span class="status-text {{($active >= 1) ? 'active' : ''}}">Game</span>
            </div>
        </a>
        <hr class="w-100 status-hr {{($active >= 2) ? 'active' : ''}}" />
        <a {{($active >= 2) ? "href=/battles/create-step2" : ''}}>
            <div class="d-flex flex-column align-items-center">
                <div class="d-flex justify-content-center align-items-center text-white status-icon {{($active >= 2) ? 'active' : ''}}">
                    <i class="fas fa-users ft-20"></i>
                </div>
                <span class="status-text {{($active >= 2) ? 'active' : ''}}">Players</span>
            </div>
        </a>
        <hr class="w-100 status-hr {{($active >= 3) ? 'active' : ''}}" />
        <a {{($active >= 3) ? "href=/battles/create-step3" : ''}}>
            <div class="d-flex flex-column align-items-center">
                <div class="d-flex justify-content-center align-items-center text-white status-icon {{($active >= 3) ? 'active' : ''}}">
                    <i class="fab fa-wpforms ft-20"></i>
                </div>
                <span class="status-text {{($active >= 3) ? 'active' : ''}}">Soldiers</span>
            </div>
        </a>
        <hr class="w-100 status-hr {{($active >= 4) ? 'active' : ''}}" />
        <a {{($active >= 4) ? "href=/battles/create-step3" : ''}}>
            <div class="d-flex flex-column align-items-center">
                <div class="d-flex justify-content-center align-items-center text-white status-icon {{($active >= 4) ? 'active' : ''}}">
                    <i class="fas fa-calendar-check ft-20"></i>
                </div>
                <span class="status-text {{($active >= 4) ? 'active' : ''}}">Battle</span>
            </div>
        </a>
        <hr class="w-100 status-hr " />
    </div>
</div>