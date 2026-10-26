<div>
    <label for="type-name">Nome da categoria</label>
    <input id="type-name" name="name" type="text" class="auth-input" value="{{ old('name', $type->name ?? '') }}" placeholder="Ex.: Água doce" maxlength="255" required autofocus aria-describedby="type-name-error">
    <div id="type-name-error"><x-input-error :messages="$errors->get('name')" /></div>
</div>
<div class="aqua-form-actions">
    <a href="{{ route('types.index') }}" class="aqua-button-secondary">Cancelar</a>
    <button type="submit" class="aqua-button">{{ isset($type) ? 'Salvar alterações' : 'Cadastrar categoria' }}</button>
</div>
