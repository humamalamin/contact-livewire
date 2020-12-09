<div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 md-offset-4">
                <div class="card">
                    <div class="card-bod">
                        @if($action != 'edit')
                            <livewire:contact.create/>
                        @else
                            <livewire:contact.edit/>
                        @endif
                        <div class="col-3 mb-2 float-right">
                            <input wire:model="search" type="text" class="form-control" placeholder="Search....">
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Nomor Telepon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>
                                            <button wire:click="selectItem('edit', {{ $contact->id }})" class="btn btn-success">Edit</button>
                                            <button wire:click="selectItem('delete', {{ $contact->id }})" class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Data Empty</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
</div>