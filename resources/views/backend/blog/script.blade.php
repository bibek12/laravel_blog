@section('script')
    <script type="text/javascript">
        $('ul.pagination').addClass('no-margin pagination-sm');
        $('#title').on('blur',function(){
            let theTitle=this.value.toLowerCase().trim(),
             slugInput=$('#slug');
             theSlug=theTitle.replace(/&/g,'-and-')
                            .replace(/[^a-z0-9-]+/g,'-')
                            .replace(/\-\-+/g,'-')
                            .replace(/^-+|-+$/g,'-');
             slugInput.val(theSlug);
        });
        var excerpt= new SimpleMDE({ element: $("#excerpt")[0] });
        var body = new SimpleMDE({ element: $("#body")[0] });
        $('#datetimepicker1').datetimepicker({
            format:'YYYY:MM:DD HH:mm:ss',
            showClear:true
        });
        $('#draft-btn').click(function(e){
            e.preventDefault();
            $('#published_at').val("");
            $('#post-form').submit();
        });
        $('#draft-btn').click(function(e){
            e.preventDefault();
            $('#post-form').submit();
        });
    </script>
@endsection