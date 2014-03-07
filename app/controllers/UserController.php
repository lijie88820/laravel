<?php

class UserController extends \BaseController {

    /**
     * User Repository
     *
     * @var User
     */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->user->all();

        return View::make('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        /*$input = Input::only('title','body');
        $validation = Validator::make($input, User::$rules);

        if ($validation->passes())
        {
            $this->user->create($input);

            return Redirect::route('user.index');
        }

        return Redirect::route('user.create')
            ->withInput()
            ->withErrors($validation)
            ->with('flash', 'There were validation errors.');*/
						
				$user = new User();
				$user->uid = 6123;
				$user->networks = array(
						array(
								'nid'				=>	3,
								'n_name'			=>	'network3',
								'n_ip'				=>	'127.0.0.3',
								'n_status'		=>	1,
						),
						array(
								'nid'				=>	4,
								'n_name'			=>	'network4',
								'n_ip'				=>	'127.0.0.4',
								'n_status'		=>	0,
						),
						array(
								'nid'				=>	5,
								'n_name'			=>	'network5',
								'n_ip'				=>	'127.0.0.5',
								'n_status'		=>	1,
						),
				);
				
				$user->hostnames = array(
						array(
								'hostname'	=>	'google.com',
								'block'			=>	1,
						),
						array(
								'hostname'	=>	'yahoo.com',
								'block'			=>	0,
						),
				);
				
				$user->save();
						
				return Redirect::route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = $this->user->findOrFail($id);

        return View::make('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->user->find($id);

        if (is_null($user))
        {
            return Redirect::route('user.index');
        }

        return View::make('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        /*$input = Input::only('title','body');
        $validation = Validator::make($input, User::$rules);

        if ($validation->passes())
        {
            $user = $this->user->find($id);
            $user->update($input);

            return Redirect::route('user.show', $id);
        }

        return Redirect::route('user.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('flash', 'There were validation errors.');*/
				
				$user = $this->user->find($id);
				$user->uid = 1234;
				$user->networks = array(
						array(
								'nid'					=>	3,
								'n_name'			=>	'network3',
								'n_ip'				=>	'127.0.0.3',
								'n_status'		=>	1,
						),
						array(
								'nid'				=>	4,
								'n_name'			=>	'network4',
								'n_ip'				=>	'127.0.0.4',
								'n_status'		=>	0,
						),
						array(
								'nid'				=>	5,
								'n_name'			=>	'network5',
								'n_ip'				=>	'127.0.0.5',
								'n_status'		=>	1,
						),
				);
				
				$user->hostnames = array(
						array(
								'hostname'	=>	'google.com',
								'block'			=>	1,
						),
						array(
								'hostname'	=>	'yahoo.com',
								'block'			=>	0,
						),
				);
				
				$user->save();
				
				return Redirect::route('user.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->user->find($id)->delete();

        return Redirect::route('user.index');
    }

}