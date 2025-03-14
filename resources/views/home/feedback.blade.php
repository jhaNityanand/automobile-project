
@include("layout-2.top")

<style>
    .valid{
        color: red;
        font-size: 20px;
        font-weight: bold;
        font-family: 'Times New Roman', Times, serif;
    }
</style>

<body class="template-color-1">
    <div class="main-wrapper">
        <br>
        <!-- Begin Uren's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Feedback</h2>
                </div>
            </div>
        </div>
        <!-- Uren's Breadcrumb Area End Here -->
        <!-- Begin Uren's About Us Area -->
        <div class="about-us-area">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                    <form action="{{url('saveFeedback')}}" method="POST" autocomplete="off">
                    @csrf
                        <h4>Feedback : </h4>
                        <textarea class="form-control" name="comment" placeholder="Feedback" id="" cols="30" rows="7"></textarea>
                        <br>
                        @if ($errors->has('comment'))
                            <div class="valid">{{$errors->first('comment')}}</div>
                        @endif
                        <br>
                        <div class="float-right">
                        <button type="submit" name="submit" class="btn btn-ft rounded-5 btn-outline-success"><b>save Feedback</b></button>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" onclick="back()" class="btn btn-ft rounded-5 btn-outline-danger"><b>Back</b></button>
                        </div>
                        <br>
                    </form>
                    <br>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's About Us Area End Here -->
        <br><br>
    </div>

    @include("layout-2.script")

</body>
</html>

<script>
    function back(){
        if(confirm("Are You Sure?")){
            window.location.href = "{{url('/')}}";
        }
    }
</script>