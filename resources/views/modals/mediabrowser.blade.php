<div class="modal" id="modal-mediabrowser">
    <div class="modal-content">
        <div class="row">
            <div class="col-2-gt-30 modal-header-title">
                <h1>Media Browser</h1>
            </div>
            <div class="col-2-gt-30 modal-header">
                <div class="modal-close float-right" id="modal-mediabrowser-close">
                    <i class="fa fa-close" id="navigation-close"></i>
                </div>
            </div>
        </div>


        <div>

            @include('partials.singlemedia')

            <br />
            <div class="row">
                <div class="col-1">
                    <a class="button--primary button--block" id="mediabrowser-upload">Media Uploaden</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-1">

            </div>
        </div>

    </div>

    <br />
    <div class="well well-nomargin">
        <div class="row mediabrowser-holder" id="mediabrowser-holder">

        </div>
    </div>
    <div class="modal-content">
        <br />
        <div class="row">
            <div class="col-2-gt-1">
                <a class="button--primary button--block" id="mediabrowser-choose">Selecteren</a>
            </div>
        </div>
        <br />
    </div>


</div>
</div>