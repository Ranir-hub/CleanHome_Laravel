<div class = "container" style="margin-top: 60px">
    <div class="row justify-content-center">
        @error('phone')
        <div class="alert alert-warning" role="alert" style =" margin-bottom: 0px">
            {{ $message }}
        </div>
        @enderror
        @error('password')
        <div class="alert alert-warning" role="alert" style =" margin-bottom: 0px">
            {{ $message }}
        </div>
        @enderror
        @error('error')
        <div class="alert alert-warning" role="alert" style =" margin-bottom: 0px">
            {{ $message }}
        </div>
        @enderror
        @error('success')
        <div class="alert alert-success" role="alert" style =" margin-bottom: 0px">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>