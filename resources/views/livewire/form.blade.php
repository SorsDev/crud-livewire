<div class="form-group">
	<label>Título</label>
	<input type="text" class="form-control" wire:model="title">
	@error('title')
		<span>{{$message}}</span>
	@enderror
</div>

<div class="form-group">
	<label>Descripción</label>
	<textarea class="form-control" wire:model="description" cols="30" rows="3"></textarea>
	@error('description')
		<span>{{$message}}</span>
	@enderror
</div>