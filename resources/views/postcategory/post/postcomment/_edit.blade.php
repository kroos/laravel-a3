					<div class="form-group row {{ $errors->has('post') ? ' has-error' : '' }}">
						{{ Form::label( 'comment', 'Comment : ', ['class' => 'col-2 col-form-label text-right'] ) }}
						<div class="col-10">
							{{ Form::textarea('comment', @$value, ['class' => 'form-control'.($errors->has('comment') ? ' is-invalid' : NULL), 'id' => 'postComment', 'placeholder' => 'Comment'], 'autofocus') }}
							@if ($errors->has('comment'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('comment') }}</strong>
							</span>
							@endif
						</div>
					</div>
					
					<div class="form-group row mb-0">
						<div class="col-8 offset-2">
							{!! Form::button('Submit', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
						</div>
					</div>