@extends('layouts.app', ['pageTitle'=>'Movy Forum'], ['title'=>'Forum'])

@section('content')
<div class="container">
    <div class="row">
        <!-- Main content -->
        <nav class="navbar navbar-expand-lg bg-transparent py-4 border-bottom">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 mx-5">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn my-2 my-sm-0 font-white p-0" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <div>
                    <a href="{{asset('forum/register')}}" class="d-inline btn square-btn btn-secondary p-2 mx-1">
                        Register
                    </a>
                    <a href="{{asset('forum/login')}}" class="d-inline btn square-btn btn-secondary p-2 mx-1">
                        <i class="bi bi-person-circle"></i>&nbsp;
                        Login
                    </a>
                </div>
            </div>
        </nav>
        <div class="mb-3 p-5">
            <div class="row text-left mb-5">
                <div class="col-lg-6 mb-3 mb-sm-0">
                    <select class="form-select form-control bg-white" data-toggle="select" tabindex="-98">
                        <option> Categories </option>
                        <option> Learn </option>
                        <option> Share </option>
                        <option> Build </option>
                    </select>
                </div>
                <div class="col-lg-6 text-lg-right">
                    <select class="form-select form-control bg-white ml-auto" data-toggle="select" tabindex="-98">
                        <option> Filter by </option>
                        <option> Threads </option>
                        <option> Replys </option>
                        <option> Views </option>
                    </select>
                </div>
            </div>
            <div class="card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
                <div class="row align-items-center">
                    <div class="col-md-8 mb-3 mb-sm-0">
                        <h5>
                            <a href="#" class="text-primary">Drupal 8 quick starter guide</a>
                        </h5>
                        <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">20 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">KenyeW</a></p>
                        <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#C++</a> <a class="text-black mr-2" href="#">#AppStrap Theme</a> <a class="text-black mr-2" href="#">#Wordpress</a> </div>
                    </div>
                    <div class="col-md-4 op-7">
                        <div class="row text-center op-7">
                            <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">141 Threads</span> </div>
                            <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">122 Replys</span> </div>
                            <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">290 Views</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--   /End of post 1 
               End of post 2 
              <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
                  <div class="row align-items-center">
                      <div class="col-md-8 mb-3 mb-sm-0">
                          <h5>
                              <a href="#" class="text-primary">HELP! My Windows XP machine is down</a>
                          </h5>
                          <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">54 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">DanielD</a></p>
                          <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#Development</a> <a class="text-black mr-2" href="#">#AppStrap Theme</a> </div>
                      </div>
                      <div class="col-md-4 op-7">
                          <div class="row text-center op-7">
                              <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">256 Threads</span> </div>
                              <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">251 Replys</span> </div>
                              <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">223 Views</span> </div>
                          </div>
                      </div>
                  </div>
              </div>
               /End of post 2 
               End of post 3 
              <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
                  <div class="row align-items-center">
                      <div class="col-md-8 mb-3 mb-sm-0">
                          <h5>
                              <a href="#" class="text-primary">Bootstrap 4 development in record time with AppStrap Bootstrap 4 Theme</a>
                          </h5>
                          <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">32 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">AppStrapMaster</a></p>
                          <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#Bootstrap 4</a> <a class="text-black mr-2" href="#">#Wordpress</a> </div>
                      </div>
                      <div class="col-md-4 op-7">
                          <div class="row text-center op-7">
                              <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">245 Threads</span> </div>
                              <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">116 Replys</span> </div>
                              <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">257 Views</span> </div>
                          </div>
                      </div>
                  </div>
              </div>
               /End of post 3 
               End of post 4 
              <div class="card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
                  <div class="row align-items-center">
                      <div class="col-md-8 mb-3 mb-sm-0">
                          <h5>
                              <a href="#" class="text-primary">Bootstrap 4 development in record time with AppStrap Bootstrap 4 Theme</a>
                          </h5>
                          <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">29 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">Themelize.me</a></p>
                          <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#Android</a> <a class="text-black mr-2" href="#">#Bootstrap 4</a> <a class="text-black mr-2" href="#">#Wordpress</a> <a class="text-black mr-2" href="#">#Drupal</a> </div>
                      </div>
                      <div class="col-md-4 op-7">
                          <div class="row text-center op-7">
                              <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">49 Threads</span> </div>
                              <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">29 Replys</span> </div>
                              <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">170 Views</span> </div>
                          </div>
                      </div>
                  </div>
              </div>
               /End of post 4 
               End of post 5 
              <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
                  <div class="row align-items-center">
                      <div class="col-md-8 mb-3 mb-sm-0">
                          <h5>
                              <a href="#" class="text-primary">Drupal 8 quick starter guide</a>
                          </h5>
                          <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">53 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">Themelize.me</a></p>
                          <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#iOS</a> <a class="text-black mr-2" href="#">#Bootstrap 4</a> </div>
                      </div>
                      <div class="col-md-4 op-7">
                          <div class="row text-center op-7">
                              <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">164 Threads</span> </div>
                              <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">82 Replys</span> </div>
                              <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">240 Views</span> </div>
                          </div>
                      </div>
                  </div>
              </div>
               /End of post 5 
               End of post 6 
              <div class="card row-hover pos-relative py-3 px-3 mb-3 border-danger border-top-0 border-right-0 border-bottom-0 rounded-0">
                  <div class="row align-items-center">
                      <div class="col-md-8 mb-3 mb-sm-0">
                          <h5>
                              <a href="#" class="text-primary">Custom shortcut or command to launch command in terminal?</a>
                          </h5>
                          <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">44 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">DanielD</a></p>
                          <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#Development</a> <a class="text-black mr-2" href="#">#C++</a> <a class="text-black mr-2" href="#">#Bootstrap 4</a> </div>
                      </div>
                      <div class="col-md-4 op-7">
                          <div class="row text-center op-7">
                              <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">180 Threads</span> </div>
                              <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">35 Replys</span> </div>
                              <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">44 Views</span> </div>
                          </div>
                      </div>
                  </div>
              </div>
               /End of post 6 
               End of post 7 
              <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
                  <div class="row align-items-center">
                      <div class="col-md-8 mb-3 mb-sm-0">
                          <h5>
                              <a href="#" class="text-primary">HELP! My Windows XP machine is down</a>
                          </h5>
                          <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">3 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">DanielD</a></p>
                          <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#C++</a> <a class="text-black mr-2" href="#">#AppStrap Theme</a> <a class="text-black mr-2" href="#">#Drupal</a> </div>
                      </div>
                      <div class="col-md-4 op-7">
                          <div class="row text-center op-7">
                              <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">236 Threads</span> </div>
                              <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">79 Replys</span> </div>
                              <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">162 Views</span> </div>
                          </div>
                      </div>
                  </div>
              </div>
               /End of post 7 
               End of post 8 
              <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
                  <div class="row align-items-center">
                      <div class="col-md-8 mb-3 mb-sm-0">
                          <h5>
                              <a href="#" class="text-primary">Bootstrap 4 development in record time with AppStrap Bootstrap 4 Theme</a>
                          </h5>
                          <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">46 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">DanielD</a></p>
                          <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#Development</a> <a class="text-black mr-2" href="#">#C++</a> <a class="text-black mr-2" href="#">#Drupal</a> </div>
                      </div>
                      <div class="col-md-4 op-7">
                          <div class="row text-center op-7">
                              <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">130 Threads</span> </div>
                              <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">121 Replys</span> </div>
                              <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">191 Views</span> </div>
                          </div>
                      </div>
                  </div>
              </div>
               /End of post 8 
               End of post 9 
              <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
                  <div class="row align-items-center">
                      <div class="col-md-8 mb-3 mb-sm-0">
                          <h5>
                              <a href="#" class="text-primary">HELP! My Windows XP machine is down</a>
                          </h5>
                          <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">41 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">KylieJ</a></p>
                          <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#Android</a> <a class="text-black mr-2" href="#">#Bootstrap 4</a> <a class="text-black mr-2" href="#">#Wordpress</a> </div>
                      </div>
                      <div class="col-md-4 op-7">
                          <div class="row text-center op-7">
                              <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">194 Threads</span> </div>
                              <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">16 Replys</span> </div>
                              <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">113 Views</span> </div>
                          </div>
                      </div>
                  </div>
              </div>
               /End of post 9 
               End of post 10 
              <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
                  <div class="row align-items-center">
                      <div class="col-md-8 mb-3 mb-sm-0">
                          <h5>
                              <a href="#" class="text-primary">HELP! My Windows XP machine is down</a>
                          </h5>
                          <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">30 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">AppStrapMaster</a></p>
                          <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#Android</a> <a class="text-black mr-2" href="#">#AppStrap Theme</a> <a class="text-black mr-2" href="#">#Wordpress</a> </div>
                      </div>
                      <div class="col-md-4 op-7">
                          <div class="row text-center op-7">
                              <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">179 Threads</span> </div>
                              <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">194 Replys</span> </div>
                              <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">167 Views</span> </div>
                          </div>
                      </div>
                  </div>
              </div>
               /End of post 10 
               End of post 11 
              <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
                  <div class="row align-items-center">
                      <div class="col-md-8 mb-3 mb-sm-0">
                          <h5>
                              <a href="#" class="text-primary">Bootstrap 4 development in record time with AppStrap Bootstrap 4 Theme</a>
                          </h5>
                          <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">56 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">AppStrapMaster</a></p>
                          <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#Development</a> <a class="text-black mr-2" href="#">#Wordpress</a> </div>
                      </div>
                      <div class="col-md-4 op-7">
                          <div class="row text-center op-7">
                              <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">11 Threads</span> </div>
                              <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">120 Replys</span> </div>
                              <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">240 Views</span> </div>
                          </div>
                      </div>
                  </div>
              </div>
               /End of post 11 
               End of post 12 
              <div class="card row-hover pos-relative py-3 px-3 mb-3 border-danger border-top-0 border-right-0 border-bottom-0 rounded-0">
                  <div class="row align-items-center">
                      <div class="col-md-8 mb-3 mb-sm-0">
                          <h5>
                              <a href="#" class="text-primary">Windows batch, recursively copy files</a>
                          </h5>
                          <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">25 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">Wizzy</a></p>
                          <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#Development</a> <a class="text-black mr-2" href="#">#Wordpress</a> </div>
                      </div>
                      <div class="col-md-4 op-7">
                          <div class="row text-center op-7">
                              <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">25 Threads</span> </div>
                              <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">211 Replys</span> </div>
                              <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">234 Views</span> </div>
                          </div>
                      </div>
                  </div>
              </div>
               /End of post 12 
               End of post 13 
              <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
                  <div class="row align-items-center">
                      <div class="col-md-8 mb-3 mb-sm-0">
                          <h5>
                              <a href="#" class="text-primary">Drupal 8 quick starter guide</a>
                          </h5>
                          <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">21 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">KylieJ</a></p>
                          <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#C++</a> <a class="text-black mr-2" href="#">#AppStrap Theme</a> </div>
                      </div>
                      <div class="col-md-4 op-7">
                          <div class="row text-center op-7">
                              <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">70 Threads</span> </div>
                              <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">187 Replys</span> </div>
                              <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">234 Views</span> </div>
                          </div>
                      </div>
                  </div>
              </div>
               /End of post 13 
               End of post 14 
              <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
                  <div class="row align-items-center">
                      <div class="col-md-8 mb-3 mb-sm-0">
                          <h5>
                              <a href="#" class="text-primary">Windows batch, recursively copy files</a>
                          </h5>
                          <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">60 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">KenyeW</a></p>
                          <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#Development</a> <a class="text-black mr-2" href="#">#iOS</a> <a class="text-black mr-2" href="#">#Bootstrap 4</a> <a class="text-black mr-2" href="#">#Wordpress</a> </div>
                      </div>
                      <div class="col-md-4 op-7">
                          <div class="row text-center op-7">
                              <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">288 Threads</span> </div>
                              <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">206 Replys</span> </div>
                              <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">1 Views</span> </div>
                          </div>
                      </div>
                  </div>
              </div>
               /End of post 14 
               End of post 15 
              <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
                  <div class="row align-items-center">
                      <div class="col-md-8 mb-3 mb-sm-0">
                          <h5>
                              <a href="#" class="text-primary">Custom shortcut or command to launch command in terminal?</a>
                          </h5>
                          <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">27 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">KylieJ</a></p>
                          <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#AppStrap Theme</a> <a class="text-black mr-2" href="#">#Wordpress</a> <a class="text-black mr-2" href="#">#Drupal</a> </div>
                      </div>
                      <div class="col-md-4 op-7">
                          <div class="row text-center op-7">
                              <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">144 Threads</span> </div>
                              <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">92 Replys</span> </div>
                              <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">25 Views</span> </div>
                          </div>
                      </div>
                  </div>
              </div>
               /End of post 15 
               End of post 16 
              <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
                  <div class="row align-items-center">
                      <div class="col-md-8 mb-3 mb-sm-0">
                          <h5>
                              <a href="#" class="text-primary">HELP! My Windows XP machine is down</a>
                          </h5>
                          <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">22 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">Themelize.me</a></p>
                          <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#Development</a> <a class="text-black mr-2" href="#">#Android</a> <a class="text-black mr-2" href="#">#Bootstrap 4</a> <a class="text-black mr-2" href="#">#Wordpress</a> </div>
                      </div>
                      <div class="col-md-4 op-7">
                          <div class="row text-center op-7">
                              <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">199 Threads</span> </div>
                              <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">75 Replys</span> </div>
                              <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">61 Views</span> </div>
                          </div>
                      </div>
                  </div>
              </div>
               /End of post 16 
               End of post 17 
              <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
                  <div class="row align-items-center">
                      <div class="col-md-8 mb-3 mb-sm-0">
                          <h5>
                              <a href="#" class="text-primary">HELP! My Windows XP machine is down</a>
                          </h5>
                          <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">14 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">AppStrapMaster</a></p>
                          <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#C++</a> <a class="text-black mr-2" href="#">#Android</a> <a class="text-black mr-2" href="#">#Drupal</a> </div>
                      </div>
                      <div class="col-md-4 op-7">
                          <div class="row text-center op-7">
                              <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">74 Threads</span> </div>
                              <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">77 Replys</span> </div>
                              <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">144 Views</span> </div>
                          </div>
                      </div>
                  </div>
              </div>
               /End of post 17 
               End of post 18 
              <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
                  <div class="row align-items-center">
                      <div class="col-md-8 mb-3 mb-sm-0">
                          <h5>
                              <a href="#" class="text-primary">Custom shortcut or command to launch command in terminal?</a>
                          </h5>
                          <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">15 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">Themelize.me</a></p>
                          <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#Android</a> <a class="text-black mr-2" href="#">#Bootstrap 4</a> <a class="text-black mr-2" href="#">#AppStrap Theme</a> </div>
                      </div>
                      <div class="col-md-4 op-7">
                          <div class="row text-center op-7">
                              <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">88 Threads</span> </div>
                              <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">48 Replys</span> </div>
                              <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">283 Views</span> </div>
                          </div>
                      </div>
                  </div>
              </div>
               /End of post 18 
               End of post 19 
              <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
                  <div class="row align-items-center">
                      <div class="col-md-8 mb-3 mb-sm-0">
                          <h5>
                              <a href="#" class="text-primary">Drupal 8 quick starter guide</a>
                          </h5>
                          <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">59 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">KylieJ</a></p>
                          <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#Android</a> <a class="text-black mr-2" href="#">#Bootstrap 4</a> <a class="text-black mr-2" href="#">#Wordpress</a> </div>
                      </div>
                      <div class="col-md-4 op-7">
                          <div class="row text-center op-7">
                              <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">82 Threads</span> </div>
                              <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">22 Replys</span> </div>
                              <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">40 Views</span> </div>
                          </div>
                      </div>
                  </div>
              </div>
               /End of post 19 
               End of post 20 
              <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
                  <div class="row align-items-center">
                      <div class="col-md-8 mb-3 mb-sm-0">
                          <h5>
                              <a href="#" class="text-primary">Bootstrap 4 development in record time with AppStrap Bootstrap 4 Theme</a>
                          </h5>
                          <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">26 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">Themelize.me</a></p>
                          <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#Development</a> <a class="text-black mr-2" href="#">#iOS</a> <a class="text-black mr-2" href="#">#Bootstrap 4</a> <a class="text-black mr-2" href="#">#Wordpress</a> </div>
                      </div>
                      <div class="col-md-4 op-7">
                          <div class="row text-center op-7">
                              <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">163 Threads</span> </div>
                              <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">236 Replys</span> </div>
                              <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">22 Views</span> </div>
                          </div>
                      </div>
                  </div>
              </div>
               /End of post 20 -->
        </div>
    </div>
</div>
@endsection