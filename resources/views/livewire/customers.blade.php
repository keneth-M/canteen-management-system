<div>
<div class="card-body">
                    @if($forUpdate)
                    <h5>Update Customer</h5>
                    @else
                    <h5>Add New Customer</h5>
                    @endif
                    <form wire:submit.prevent="saveCustomer">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label">First Name</div>
                                <input type="" wire:model="FirstName" class="form-control">
                                @error('FirstName')
                                <span class="text-danger" role="alert">
                                <strong>{{ $message }} </strong> </span>>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="form-label">Middle Name</div>
                                <input type="" wire:model="MiddleName" class="form-control">
                                @error('MiddleName')
                                <span class="text-danger" role="alert">
                                <strong>{{ $message }} </strong> </span>>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-label">Last Name</div>
                                <input type="" wire:model="LastName" class="form-control">
                                @error('LastName')
                                <span class="text-danger" role="alert">
                                <strong>{{ $message }} </strong> </span>>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <div class="form-label">Gender</div>
                                <select class="form-control" wire:model="Gender">
                                    <option value="">--Select Gender--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                @error('Gender')
                                <span class="text-danger" role="alert">
                                <strong>{{ $message }} </strong> </span>>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <div class="form-label">Date of Birth</div>
                                <input type="date" wire:model="DOB" class="form-control">
                                @error('DOB')
                                <span class="text-danger" role="alert">
                                <strong>{{ $message }} </strong> </span>>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-label">Mobile Number</div>
                                <input type="" wire:model="MobileNumber" class="form-control">
                                @error('MobileNumber')
                                <span class="text-danger" role="alert">
                                <strong>{{ $message }} </strong> </span>>
                                @enderror
                              </div>
                            </div>
                         </div>
                    </div>
                    <div class="d-flex justify-content-end">
                    @if($forUpdate)
                    <button class="btn btn-success">Update</button>
                    @else
                    <button class="btn btn-success">Save</button>
                    @endif
                    </div>
                </form>
                
<div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List Of Customers</h6>
                        </div>
                <hr>
                <table class="table">
                    <thead>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Mobile Number</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if(isset($list))
                            @foreach($list as $L)
                                <tr>
                                    <td>{{ $L->FirstName }}</td>
                                    <td>{{ $L->MiddleName }}</td>
                                    <td>{{ $L->LastName }}</td>
                                    <td>{{ $L->Gender }}</td>
                                    <td>{{ date('F, d, Y',strtotime($L->DOB)) }}</td>
                                    <td>{{ $L->MobileNumber }}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm"
                                        wire:click="update('{{ $L->id }}')">
                                        Edit</button>

                                        <button class="btn btn-danger btn-sm"
                                        wire:click="delete('{{ $L->id }}')">
                                        Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
             </table>
        </hr>
</div>

