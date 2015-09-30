<div class="page-header">
  <h1>Backend::Users::New</h1>
</div>

{{ form("users/create", 'method': 'post', 'class': 'form-horizontal') }}
  <div class="form-group">
    {{ form.label('email', ['class': 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
      {{ form.render('email', ['class': 'form-control', 'maxlength': 255, 'autocomplete': 'off']) }}
      {{ form.messages('email') }}
    </div>
  </div>
  <div class="form-group">
    {{ form.label('password', ['class': 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
      {{ form.render('password', ['class': 'form-control', 'autocomplete': 'off']) }}
      {{ form.messages('password') }}
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Create</button>
    </div>
  </div>
{{ end_form() }}