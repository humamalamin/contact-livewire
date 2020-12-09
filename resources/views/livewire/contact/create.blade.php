<div>
    <div class="container">
        <form wire:submit.prevent="store">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" wire:model="name" name="name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">Nomor Telepon</label>
                <input type="text" wire:model="phone" name="phone" class="form-control @error('phone') is-invalid @enderror">
                @error('phone')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
