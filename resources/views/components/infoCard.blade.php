<div class="col mx-3">
    <div class="my-1 border rounded row shadow align-items-center bg-white" style="max-width: 850px">
        <div class="col-sm-1 m-2" >
            <img src="{{ $section_img_src }}" style="width: 35px; height: 35px">
        </div>
        <div class="col-sm-auto p-2 m-2 lead">
            <div class="d-flex justp-2 ify-content-start">
            <ul>
            @foreach($infos as $info)
                <li>{{$info->title}} {{$info->desc}}
            @endforeach
            </ul>
        </div>
    </div>
