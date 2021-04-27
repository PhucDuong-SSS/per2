<?php
namespace App\Http\Services;

use App\Models\Organization;

class OrganizationService 
{
    protected $organizationModel;
    
    public function __construct(Organization $organizationModel)
    {
        $this->organizationModel = $organizationModel;   
    }

    public function getAll()
    {
        return $this->organizationModel->all();
    }

    public function delete($id)
    {
        $organization = Organization::findOrFail($id);
        $organization->delete();
        return $organization;
    }
    public function store($request)
    {
        $organization = new Organization();
        $organization->name = $request->name;
        $organization->email = $request->email;
        $organization->address = $request->address;
        $organization->address = $request->address;
        $organization->address = $request->address;
        $organization->save();
        return $organization;
    }

}