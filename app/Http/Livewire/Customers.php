<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Customers extends Component
{
    use LivewireAlert;
    public $FirstName, $MiddleName, $LastName, $Gender, $DOB, $MobileNumber, $forUpdate;

    public function render()
    {
        $this->list = Customer::orderBy('id','DESC')->get();
        return view('livewire.customers');
    }

    public function delete($id)
    {
        $delete = Customer::where('id', $id)->delete();
        if($delete)
            $this->alert('success','Successfully deleted!');
    }
    
    public function update($id)
    {
        $info = Customer::where('id', $id)->first();
        
        if(isset($info)){
            $this->sessionID           =$id;
            $this->forUpdate           =true;
            $this->FirstName           =$info->FirstName;
            $this->MiddleName          =$info->MiddleName;
            $this->LastName            =$info->LastName;
            $this->Gender              =$info->Gender;
            $this->DOB                 =$info->DOB;
            $this->MobileNumber        =$info->MobileNumber;
    }
}

    public function saveCustomer()
    {
        $validate = $this->validate([
            'FirstName'     => 'required',
            'LastName'      => 'required',
            'DOB'   => 'required',
            'MobileNumber'  => 'required',
        ]);

        if($validate){
            if($this->forUpdate){
                $data = [
                    'FirstName' => $this->FirstName,
                    'MiddleName' => $this->MiddleName,
                    'LastName' => $this->LastName,
                    'Gender' => $this->Gender,
                    'DOB' => $this->DOB,
                    'MobileNumber' => $this->MobileNumber,
                ];

                $update = Customer::where('id', $this->sessionID)
                ->update($data);
                if($update){
                    $this->alert('success', $this->FirstName.''.$this->LastName.' has been updated',['toast' => false,'position' => 'center']);
                }

            }else{
                $c = new Customer();
                $c->CustomerNo = strtoupper(uniqid());
                $c->FirstName = $this->FirstName;
                $c->MiddleName = $this->MiddleName;
                $c->LastName = $this->LastName;
                $c->Gender = $this->Gender;
                $c->DOB = $this->DOB;
                $c->MobileNumber = $this->MobileNumber;
                $c->save();

                $this->alert('success', $this->FirstName.''.$this->LastName.' has been added',['toast' => false,'position' => 'center']);
            }

            unset($this->FirstName);
            unset($this->MiddleName);
            unset($this->LastName);
            unset($this->DOB);
            unset($this->Gender);
            unset($this->MobileNumber);

        }
    }
}


