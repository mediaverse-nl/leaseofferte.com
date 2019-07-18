<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{!! $title !!}</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    {!! $heading !!}
                </thead>
                <tfoot>
                    {!! $heading !!}
                </tfoot>
                <tbody>
                    {!! $body !!}
                </tbody>
            </table>
        </div>
    </div>
</div>