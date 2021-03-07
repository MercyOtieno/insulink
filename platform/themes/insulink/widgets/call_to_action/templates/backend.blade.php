<div class="form-group">
    <label for="widget-name">Title</label>
    <input type="text" class="form-control" name="name" value="{{ $config['name'] }}">
</div>
<div class="form-group">
    <label for="widget-name">Sub Title</label>
    <input type="text" class="form-control" name="subtitle" value="{{ $config['subtitle'] }}">
</div>
<div class="form-group">
    <label for="widget-name">Button Link</label>
    <input type="text" class="form-control" name="btn_link" value="{{ $config['btn_link'] }}">
</div>
<div class="form-group">
    <label for="widget-name">Button Title</label>
    <input type="text" class="form-control" name="btn_title" value="{{ $config['btn_title'] }}">
</div>
<div class="form-group">
    <label for="">Button Layout</label>
    <div class="btn-group w-100 btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-secondary active">
            <input type="radio" name="button_layout" id="option1" value="right" checked> Right side
        </label>
        <label class="btn btn-secondary">
            <input type="radio" name="button_layout" id="option2" value="center"> Center
        </label>
    </div>
</div>
