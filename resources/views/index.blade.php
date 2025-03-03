<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lock my times | One solution for time attendance</title>
    <meta
      name="description"
      content="A Fully Responsive Tailwind CSS Template, personal, agency, application, business, clean, creative, it solutions, startup, career, blog, modern, creative, multipurpose, portfolio, saas, software, tailwind css, etc."
    />
    <meta
      name="keywords"
      content="Onepage, creative, modern, Tailwind CSS, multipurpose, clean"
    />
    <meta name="author" content="Zoyothemes" />

    <!-- favicon -->
    <link href="{{asset('asset/images/favicon.ico')}}" rel="shortcut icon" />


    <!-- Icons Css -->
    <link href="{{asset('asset/css/icons.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Jarallax Css -->
    <link href="{{asset('asset/libs/jarallax/jarallax.min.css')}}" rel="stylesheet">

    <!-- Swiper Css -->
    <link href="{{asset('asset/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Main Css -->
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet" type="text/css">

</head>

<body>

    <!-- Navbar Start -->
    <nav
      class="navbar fixed top-0 start-0 end-0 z-999 transition-all duration-500 py-5 items-center shadow-md lg:shadow-none [&.is-sticky]:bg-white group [&.is-sticky]:shadow-md bg-white lg:bg-transparent"
      id="navbar"
    >
      <div class="container">
        <div class="flex lg:flex-nowrap flex-wrap items-center">
          <a href="#" class="flex items-center">
            <i data-lucide="qr-code" class="size-8 text-primary"></i>

            <div class="flex">
              <span class="text-[26px] font-bold text-primary ms-2">Lockmy </span>
              <span class="text-[26px] font-bold text-primary">times</span>
            </div>
          </a>

          <div class="lg:hidden flex items-center ms-auto px-2.5">
            <button
              class="hs-collapse-toggle"
              type="button"
              id="hs-unstyled-collapse"
              data-hs-collapse="#navbarCollapse"
            >
              <i data-lucide="menu" class="h-8 w-8 text-black"></i>
            </button>
          </div>

          <div
            class="navigation hs-collapse transition-all duration-300 lg:basis-auto basis-full grow hidden items-center justify-center lg:flex mx-auto overflow-hidden mt-6 lg:mt-0 nav-light"
            id="navbarCollapse"
          >
            <ul
              class="navbar-nav flex-col lg:flex-row gap-y-2 flex lg:items-center justify-center"
              id="navbar-navlist"
            >
              <li
                class="nav-item mx-1.5 transition-all text-dark lg:text-black group-[&.is-sticky]:text-dark all duration-300 hover:text-primary [&.active]:!text-primary group-[&.is-sticky]:[&.active]:text-primary"
              >
                <a
                  class="nav-link inline-flex items-center text-sm lg:text-base font-medium py-0.5 px-2 capitalize"
                  href="#home"
                  >Home</a
                >
              </li>

              <li
                class="nav-item mx-1.5 transition-all text-dark lg:text-black group-[&.is-sticky]:text-dark duration-300 hover:text-primary [&.active]:!text-primary group-[&.is-sticky]:[&.active]:text-primary"
              >
                <a
                  class="nav-link inline-flex items-center text-sm lg:text-base font-medium py-0.5 px-2 capitalize"
                  href="#services"
                  >Services</a
                >
              </li>

              <li
                class="nav-item mx-1.5 transition-all text-dark lg:text-black group-[&.is-sticky]:text-dark duration-300 hover:text-primary [&.active]:!text-primary group-[&.is-sticky]:[&.active]:text-primary"
              >
                <a
                  class="nav-link inline-flex items-center text-sm lg:text-base font-medium py-0.5 px-2 capitalize"
                  href="#features"
                  >Features</a
                >
              </li>

              <li
                class="nav-item mx-1.5 transition-all text-dark lg:text-black group-[&.is-sticky]:text-dark duration-300 hover:text-primary [&.active]:!text-primary group-[&.is-sticky]:[&.active]:text-primary"
              >
                <a
                  class="nav-link inline-flex items-center text-sm lg:text-base font-medium py-0.5 px-2 capitalize"
                  href="#about"
                  >About</a
                >
              </li>

              <li
                class="nav-item mx-1.5 transition-all text-dark lg:text-black group-[&.is-sticky]:text-dark duration-300 hover:text-primary [&.active]:!text-primary group-[&.is-sticky]:[&.active]:text-primary"
              >
                <a
                  class="nav-link inline-flex items-center text-sm lg:text-base font-medium py-0.5 px-2 capitalize"
                  href="#pricing"
                  >Pricing</a
                >
              </li>
              <li
                class="nav-item mx-1.5 transition-all text-dark lg:text-black group-[&.is-sticky]:text-dark duration-300 hover:text-primary [&.active]:!text-primary group-[&.is-sticky]:[&.active]:text-primary"
              >
                <a
                  class="nav-link inline-flex items-center text-sm lg:text-base font-medium py-0.5 px-2 capitalize"
                  href="#FAQs"
                  >FAQs</a
                >
              </li>

              <li
                class="nav-item mx-1.5 transition-all text-dark lg:text-black group-[&.is-sticky]:text-dark duration-300 hover:text-primary [&.active]:!text-primary group-[&.is-sticky]:[&.active]:text-primary"
              >
                <a
                  class="nav-link inline-flex items-center text-sm lg:text-base font-medium py-0.5 px-2 capitalize"
                  href="#testimonial"
                  >Testimonials</a
                >
              </li>

              <!-- <li
                class="nav-item mx-1.5 transition-all text-dark lg:text-black group-[&.is-sticky]:text-dark duration-300 hover:text-primary [&.active]:!text-primary group-[&.is-sticky]:[&.active]:text-primary"
              >
                <a
                  class="nav-link inline-flex items-center text-sm lg:text-base font-medium py-0.5 px-2 capitalize"
                  href="#blog"
                  >Blog</a
                >
              </li> -->

              <li
                class="nav-item mx-1.5 transition-all text-dark lg:text-black group-[&.is-sticky]:text-dark duration-300 hover:text-primary [&.active]:!text-primary group-[&.is-sticky]:[&.active]:text-primary"
              >
                <a
                  class="nav-link inline-flex items-center text-sm lg:text-base font-medium py-0.5 px-2 capitalize"
                  href="#contact"
                  >Contact</a
                >
              </li>
            </ul>
          </div>

          <div class="ms-auto shrink hidden lg:inline-flex gap-2">
            <a
              href="#contact"
              class="py-2 px-6 inline-flex items-center gap-2 rounded-md text-base text-white bg-primary hover:bg-primaryDark transition-all duration-500 font-medium"
            >
              <i data-lucide="download" class="h-4 w-4 fill-white/40"></i>
              <span class="hidden sm:block">Download</span>
            </a>
          </div>
        </div>
      </div>
    </nav>


    <!-- =========== Hero Section Start =========== -->
    <section class="relative md:py-40 py-20 bg-primary/10" id="home">
        <div class="container">

            <div class="grid lg:grid-cols-2 grid-cols-1 gap-x-6 gap-y-10 items-center">
                <div class="relative">
                    <h1 class="text-3xl md:text-5xl/tight lg:text-6xl/tight text-black tracking-normal capitalize leading-normal font-bold max-w-2xl mt-4">Streamline Your Workforce with <br> <span class="text-primary">Real-Time Insights</span></h1>
                    <p class="text-base text-muted font-medium max-w-lg mt-6 capitalize">Our Time Attendance Management System simplifies workplace operations with real-time tracking, automated reporting, and advanced analytics. From shift scheduling to progress insights, it optimizes productivity and ensures efficient workforce management.</p>
                    <div class="flex items-center justify-center lg:justify-normal gap-3 mt-10">
                        <img src="{{asset('asset/images/store.png')}}" class="md:h-14 h-10" alt="apple image">
                        <img src="{{asset('asset/images/google.png')}}" class="md:h-14 h-10" alt="google image">
                    </div>
                </div>

                <div class="relative">
                    <img src="https://zoyothemes.com/tailwind/evea/assets/images/dashboard-2.png" class="lg:ms-auto mx-auto rounded-xl" alt="">
                </div>
            </div>
        </div>
    </section>

  <!-- Services Start -->
    <section id="services" class="md:py-20 py-10">
        <div class="container">
            <div class="max-w-2xl mx-auto text-center">
                <span class="text-sm text-primary uppercase font-semibold tracking-wider text-default-950">Services</span>
                <h2 class="text-3xl md:text-4xl/tight font-semibold text-black mt-4">Revolutionize Workforce Management with Smart Solutions</h2>
                <p class="text-base font-medium mt-4 text-muted">Efficient, modern, and hassle-free tools to manage your workforce seamlessly.</p>
            </div>

            <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-x-3 gap-y-6 md:gap-y-12 lg:gap-y-24 md:pt-20 pt-12">

                <div class="text-center">
                    <div class="flex items-center justify-center">
                        <div class="items-center justify-center flex bg-primary/10 rounded-[49%_80%_40%_90%_/_50%_30%_70%_80%] h-20 w-20 border">
                            <i data-lucide="qr-code" class="h-10 w-10 text-primary"></i>
                        </div>
                    </div>
                    <h1 class="text-xl font-semibold pt-4">QR-Based Attendance</h1>
                    <p class="text-base text-gray-600 mt-2">Eliminate traditional machines with mobile app-based QR attendance tracking.</p>
                </div>

                <div class="text-center">
                    <div class="flex items-center justify-center">
                        <div class="items-center justify-center flex bg-primary/10 rounded-[49%_80%_40%_90%_/_50%_30%_70%_80%] h-20 w-20 border">
                            <i data-lucide="map-pin" class="h-10 w-10 text-primary"></i>
                        </div>
                    </div>
                    <h1 class="text-xl font-semibold pt-4">GPS Monitoring</h1>
                    <p class="text-base text-gray-600 mt-2">Track employee location in real-time for accurate attendance and field monitoring.</p>
                </div>

                <div class="text-center">
                    <div class="flex items-center justify-center">
                        <div class="items-center justify-center flex bg-primary/10 rounded-[49%_80%_40%_90%_/_50%_30%_70%_80%] h-20 w-20 border">
                            <i data-lucide="users" class="h-10 w-10 text-primary"></i>
                        </div>
                    </div>
                    <h1 class="text-xl font-semibold pt-4">HR Management</h1>
                    <p class="text-base text-gray-600 mt-2">Streamline HR processes, from onboarding to payroll, with centralized employee data management.</p>
                </div>
                
                <div class="text-center">
                    <div class="flex items-center justify-center">
                        <div class="items-center justify-center flex bg-primary/10 rounded-[49%_80%_40%_90%_/_50%_30%_70%_80%] h-20 w-20 border">
                            <i data-lucide="clipboard-list" class="h-10 w-10 text-primary"></i>
                        </div>
                    </div>
                    <h1 class="text-xl font-semibold pt-4">Task Management</h1>
                    <p class="text-base text-gray-600 mt-2">Assign, track, and manage tasks efficiently to ensure timely project completion and team productivity.</p>
                </div>

                <div class="text-center">
                    <div class="flex items-center justify-center">
                        <div class="items-center justify-center flex bg-primary/10 rounded-[49%_80%_40%_90%_/_50%_30%_70%_80%] h-20 w-20 border">
                            <i data-lucide="users" class="h-10 w-10 text-primary"></i>
                        </div>
                    </div>
                    <h1 class="text-xl font-semibold pt-4">Employee Management</h1>
                    <p class="text-base text-gray-600 mt-2">Centralize employee data, roles, and permissions for better management.</p>
                </div>

                <div class="text-center">
                    <div class="flex items-center justify-center">
                        <div class="items-center justify-center flex bg-primary/10 rounded-[49%_80%_40%_90%_/_50%_30%_70%_80%] h-20 w-20 border">
                            <i data-lucide="bell" class="h-10 w-10 text-primary"></i>
                        </div>
                    </div>
                    <h1 class="text-xl font-semibold pt-4">Real-Time Alerts</h1>
                    <p class="text-base text-gray-600 mt-2">Get instant notifications for attendance anomalies or schedule changes.</p>
                </div>

                <div class="text-center">
                    <div class="flex items-center justify-center">
                        <div class="items-center justify-center flex bg-primary/10 rounded-[49%_80%_40%_90%_/_50%_30%_70%_80%] h-20 w-20 border">
                            <i data-lucide="cloud" class="h-10 w-10 text-primary"></i>
                        </div>
                    </div>
                    <h1 class="text-xl font-semibold pt-4">Cloud-Based Access</h1>
                    <p class="text-base text-gray-600 mt-2">Access your data securely from anywhere with seamless web & mobile app.</p>
                </div>

                <div class="text-center">
                    <div class="flex items-center justify-center">
                        <div class="items-center justify-center flex bg-primary/10 rounded-[49%_80%_40%_90%_/_50%_30%_70%_80%] h-20 w-20 border">
                            <i data-lucide="bar-chart-2" class="h-10 w-10 text-primary"></i>
                        </div>
                    </div>
                    <h1 class="text-xl font-semibold pt-4">Analytics & Insights</h1>
                    <p class="text-base text-gray-600 mt-2">Gain actionable insights with advanced analytics for better decision-making.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Services End -->

 <!-- Feature Start -->
    <section id="features" class="md:py-20 py-10">
        <div class="container">
            <div class="grid lg:grid-cols-2 items-center gap-6">
                <div class="flex items-center">
                    <img src="https://img.freepik.com/free-vector/smartphone-scanning-qr-code_23-2148624249.jpg" class="md:h-[650px] h-full rounded-xl mx-auto" alt="feature section">
                </div>

                <div class="lg:ms-5 ms-8">
                    <span class="text-sm text-primary uppercase font-semibold tracking-wider text-default-950">Focused on Innovation</span>
                    <h2 class="text-3xl md:text-4xl/tight font-semibold text-black mt-4">Modernize Your Workforce Management</h2>
                    <a href="#" class="inline-flex items-center justify-center gap-3 text-sm font-medium text-black mt-6">Learn More
                        <i data-lucide="move-right"></i>
                    </a>
                    <hr class="border-gray-200 my-6"></hr>

                    <!-- QR-Based Attendance -->
                    <div class="flex items-start gap-5">
                        <div>
                            <div class="w-12 h-12 rounded-full border border-dashed border-primary/40 bg-primary/10 flex items-center justify-center">
                                <i data-lucide="qr-code" class="text-base text-blue-600"></i>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-xl font-semibold">From Machines to QR Codes</h4>
                            <p class="text-base font-normal text-gray-500 mt-2">Ditch traditional machines and embrace mobile-based QR attendance for seamless, accurate, and efficient tracking.</p>
                        </div>
                    </div>

                    <!-- Project Management -->
                    <div class="flex items-start gap-5 mt-8">
                        <div>
                            <div class="w-12 h-12 rounded-full border border-dashed border-primary/40 bg-primary/10 flex items-center justify-center">
                                <i data-lucide="clipboard-list" class="text-base text-blue-600"></i>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-xl font-semibold">Streamlined Project Management</h4>
                            <p class="text-base font-normal text-gray-500 mt-2">Efficiently assign, track, and manage tasks to ensure timely project completion and team productivity.</p>
                        </div>
                    </div>

                    <!-- Cloud-Based Access -->
                    <div class="flex items-start gap-5 mt-8">
                        <div>
                            <div class="w-12 h-12 rounded-full border border-dashed border-primary/40 bg-primary/10 flex items-center justify-center">
                                <i data-lucide="cloud" class="text-base text-blue-600"></i>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-xl font-semibold">Cloud-Based Accessibility</h4>
                            <p class="text-base font-normal text-gray-500 mt-2">Access your workforce data anytime, anywhere, with our secure cloud-based platform, available on both desktop and mobile.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature End -->

    <section class="relative md:py-20 py-10 bg-cover bg-no-repeat bg-center" style="background-image: url('https://coamplifi.com/wp-content/uploads/2021/04/coamplifi-meetings-1.jpg');" data-jarallax data-speed="0.20">
        <div class="absolute inset-0 w-full h-full bg-gray-900/70"></div>
    
        <div class="container">
            <div class="pb-10 lg:pb-0 flex flex-col items-center justify-center">
                <h1 class="text-3xl md:text-4xl/tight font-semibold text-white text-center">Efficient Management for Every Aspect of Your Workforce</h1>
                <p class="text-base font-normal max-w-xl text-center mx-auto text-white mt-6">Our system seamlessly integrates time tracking, employee management, HR functionalities, and project management tools, empowering your organization to streamline operations and drive productivity.</p>
                <!-- <div class="flex flex-wrap mt-6 gap-3">
                    <button class="py-2 px-6 rounded-md text-white text-base bg-primary hover:bg-primaryDark border border-primary hover:border-primaryDark transition-all duration-500 font-medium">Get Started</button>
                    <button class="py-2 px-6 rounded-md border border-white text-base hover:border-white hover:bg-white hover:text-primary transition-all duration-500 font-medium text-white">Watch Demo</button>
                </div> -->
            </div>
        </div>
    </section>

    <!-- About Start -->
    <section id="about" class="md:py-20 py-10">
        <div class="container">
            <div class="grid lg:grid-cols-2 items-center gap-6">
                <div class="lg:ms-5 ms-8">
                    <div>
                        <span class="text-sm text-primary uppercase font-semibold tracking-wider text-default-950">Get Started</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl/tight font-semibold text-black mt-4">Simplify Attendance Management in Three Easy Steps</h2>
                    <p class="text-base font-normal text-muted mt-6">Transform the way you manage attendance with our modern, mobile-based solution. From registration to daily tracking, our platform makes workforce management effortless and efficient.</p>
    
                    <div class="grid lg:grid-cols-3 grid-cols-1 gap-8 mt-9">
    
                        <!-- Step 1: Register Yourself -->
                        <div class="">
                            <div class="flex items-center justify-start">
                                <div class="items-center justify-center flex bg-green-50 rounded-full h-20 w-20 border border-dashed border-green-50">
                                    <i data-lucide="user-plus" class="h-8 w-8 text-black"></i>
                                </div>
                            </div>
                            <h1 class="text-xl font-semibold pt-6">1. Register</h1>
                            <p class="text-base text-gray-600 font-normal mt-2">Create your account in just a few simple steps.</p>
                        </div>
    
                        <!-- Step 2: Maintain and Organize -->
                        <div class="">
                            <div class="flex items-center justify-start">
                                <div class="items-center justify-center flex bg-red-50 rounded-full h-20 w-20 border border-dashed border-red-50">
                                    <i data-lucide="settings" class="h-8 w-8 text-black"></i>
                                </div>
                            </div>
                            <h1 class="text-xl font-semibold pt-6">2. Organize</h1>
                            <p class="text-base text-gray-600 font-normal mt-2">Easily manage your employee data.</p>
                        </div>
    
                        <!-- Step 3: Start Marking Attendance -->
                        <div class="">
                            <div class="flex items-center justify-start">
                                <div class="items-center justify-center flex bg-primary/10 rounded-full h-20 w-20 border border-dashed border-primary/10">
                                    <i data-lucide="qr-code" class="h-8 w-8 text-black"></i>
                                </div>
                            </div>
                            <h1 class="text-xl font-semibold pt-6">3. Attendance</h1>
                            <p class="text-base text-gray-600 font-normal mt-2">Use our QR to mark attendance.</p>
                        </div>
                    </div>
                </div>
    
                <div class="flex items-center">
                    <img src="https://zoyothemes.com/tailwind/evea/assets/images/feature-iphone.png" class="md:h-[600px] h-full rounded-xl mx-auto" alt="feature-image">
                </div>
            </div>
        </div>
    </section>
    <!-- About End -->

    <!-- Pricing Start -->
    <section id="pricing" class="md:py-20 py-10">
        <div class="container">
            <div class="max-w-2xl mx-auto text-center">
                <div>
                    <span class="text-sm text-primary uppercase font-semibold tracking-wider text-default-950">Pricing</span>
                </div>
                <h2 class="text-3xl md:text-4xl/tight font-semibold text-black mt-4">Get the power of the professional services with the simple price</h2>
            </div>

            <div class="grid grid-cols-1 mt-8">
                <div class="flex justify-center">
                    <div id="toggle-count" class="p-1 inline-block border border-gray-200 rounded-lg">
                        <span class="relative inline-block">
                            <input id="toggle-count-monthly" name="toggle-count" type="radio" class="absolute top-0 end-0 size-full border-transparent bg-transparent bg-none text-white rounded-lg cursor-pointer focus:border-0 focus:ring-transparent focus:ring-offset-transparent" checked>
                            <label for="toggle-count-monthly" class="inline-block py-2 px-5 rounded-s-md uppercase text-sm font-semibold">
                                Monthly
                            </label>
                        </span>
                        <span class="relative inline-block">
                            <input id="toggle-count-annual" name="toggle-count" type="radio" class="absolute top-0 end-0 size-full border-transparent bg-transparent bg-none text-white rounded-lg cursor-pointer focus:border-0 focus:ring-transparent focus:ring-offset-transparent">
                            <label for="toggle-count-annual" class="inline-block py-2 px-5 rounded-e-md uppercase text-sm font-semibold">
                                Annual
                            </label>
                        </span>
                    </div>
                </div>

                <p class="text-muted text-base mx-auto mt-5">Save up to 15% with Annual Plan.</p>

                <div id="StarterContent">
                    <div class="mt-14" id="start-month" role="tabpanel" aria-labelledby="start-month-tab">
                        <div class="grid lg:grid-cols-3 grid-cols-1 gap-10">

                            <div class="flex flex-col shadow-2xl rounded-xl bg-white overflow-hidden">
                                <div class="text-center pt-10">
                                    <img src="https://zoyothemes.com/tailwind/evea/assets/images/vector/vector-1.png" class="h-28 w-28 mx-auto" alt="email">
                                    <h5 class="text-2xl font-semibold text-black">Free Trail</h5>
                                    <h2 class="text-5xl mt-5 mb-1 items-center align-middle">
                                        <sup class="text-3xl align-middle">$</sup>
                                        <span data-hs-toggle-count='{
                                            "target": "#toggle-count",
                                            "min": 49,
                                            "max": 199
                                          }' >0</span>
                                    </h2>
                                    <span class="text-base font-medium text-muted">15 Days</span>
                                </div>

                                <div class="px-5 py-5 mx-auto">
                                    <ul class="text-center">
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">1 Gb Storage</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">3 Domain Names</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">5 FTP Users</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="x" class="text-muted text-lg align-middle me-2"></i>
                                            <h5 class="font-medium text-muted">Free Support</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="x" class="text-muted text-lg align-middle me-2"></i>
                                            <h5 class="font-medium text-muted">Free SSI Certificate</h5>
                                        </li>
                                    </ul>
                                </div>

                                <div class="flex justify-center px-10 pb-10">
                                    <a href="/admin/registration" class="py-2 px-6 inline-flex rounded-md text-base items-center justify-center border border-primary text-white bg-primary hover:bg-primaryDark transition-all duration-500 font-medium w-full">Buy</a>
                                </div>
                            </div>

                            <div class="flex flex-col shadow-2xl rounded-xl bg-white overflow-hidden">
                                <div class="text-center pt-10">
                                    <img src="https://zoyothemes.com/tailwind/evea/assets/images/vector/vector-2.png" class="h-28 w-28 mx-auto"
                                        alt="vector-2">
                                    <h5 class="text-2xl font-semibold text-black">Premium</h5>
                                    <h2 class="text-5xl mt-5 mb-1 items-center align-middle">
                                        <sup class="text-3xl align-middle">$</sup>
                                        <span data-hs-toggle-count='{
                                            "target": "#toggle-count",
                                            "min": 78,
                                            "max": 299
                                          }' >78</span>
                                    </h2>
                                    <span class="text-base font-medium text-muted">per month</span>
                                </div>

                                <div class="px-5 py-5 mx-auto">
                                    <ul class="text-center text-black">
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">1 Gb Storage</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">3 Domain Names</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">5 FTP Users</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">Free Support</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="x" class="text-muted text-lg align-middle me-2"></i>
                                            <h5 class="font-medium text-muted">Free SSI Certificate</h5>
                                        </li>
                                    </ul>
                                </div>

                                <div class="flex justify-center px-10 pb-10">
                                    <button class="py-2 px-6 inline-flex rounded-md text-base items-center justify-center border border-primary text-white bg-primary hover:bg-primaryDark transition-all duration-500 font-medium w-full">Buy Premium</button>
                                </div>
                            </div>

                            <div class="flex flex-col shadow-2xl rounded-xl bg-white overflow-hidden ">
                                <div class="text-center pt-10">
                                    <img src="https://zoyothemes.com/tailwind/evea/assets/images/vector/vector-3.png" class="h-28 w-28 mx-auto"
                                        alt="vector-3">
                                    <h5 class="text-2xl font-semibold text-black">Enterprise</h5>
                                    <h2 class="text-5xl mt-5 mb-1 items-center align-middle">
                                        <sup class="text-3xl align-middle">$</sup>
                                        <span data-hs-toggle-count='{
                                            "target": "#toggle-count",
                                            "min": 99,
                                            "max": 399
                                          }' >99</span>
                                    </h2>
                                    <span class="text-base font-medium text-muted">per month</span>
                                </div>

                                <div class="px-5 py-5 mx-auto">
                                    <ul class="text-center text-black">
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">1 Gb Storage</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">3 Domain Names</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">5 FTP Users</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">Free Support</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">Free SSI Certificate</h5>
                                        </li>
                                    </ul>
                                </div>

                                <div class="flex justify-center px-10 pb-10">
                                    <button class="py-2 px-6 inline-flex rounded-md text-base items-center justify-center border border-primary text-white bg-primary hover:bg-primaryDark transition-all duration-500 font-medium w-full">Buy Enterprise</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing End-->

    <!-- Faqs Start -->
    <section id="FAQs" class="md:py-20 py-10 bg-gray-50">
        <div class="container">
            <div class="">
                <div class="text-center max-w-xl mx-auto">
                    <div>
                        <span class="text-sm text-primary font-medium tracking-wider text-default-950 mb-6">FAQs</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl/tight font-semibold mt-4">Frequently Asked Questions</h2>
                </div>

                <div id="accordion-collapse" data-accordion="collapse" class="md:gap-[30px] mt-14 bg-white rounded-xl">
                    <div class="hs-accordion-group divide-y divide-gray-200">

                        <!-- FAQ 1: How does QR-based attendance work? -->
                        <div class="relative overflow-hidden">
                            <h2 class="text-base font-semibold" id="accordion-collapse-heading-1">
                                <button type="button" class="flex justify-between items-center px-5 py-4 w-full font-semibold text-lg text-start" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                                    aria-controls="accordion-collapse-body-1">
                                    <span>How does QR-based attendance work?</span>
                                    <svg data-accordion-icon class="size-4 rotate-180 shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg> 
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-1" class="hidden"
                                aria-labelledby="accordion-collapse-heading-1">
                                <div class="px-5 pb-5">
                                    <p class="text-muted text-base font-normal">QR-based attendance allows employees to mark their attendance using a mobile app. Each employee scans a unique QR code displayed at the workplace, and their attendance is recorded instantly in the system. This eliminates the need for traditional machines and ensures accurate tracking.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 2: Can I manage employee schedules with this platform? -->
                        <div class="relative overflow-hidden">
                            <h2 class="text-base font-semibold" id="accordion-collapse-heading-2">
                                <button type="button" class="flex justify-between items-center px-5 py-4 w-full font-semibold text-lg text-start" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                                    aria-controls="accordion-collapse-body-2">
                                    <span>Can I manage employee schedules with this platform?</span>
                                    <svg data-accordion-icon class="size-4 shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-2" class="hidden"
                                aria-labelledby="accordion-collapse-heading-2">
                                <div class="px-5 pb-5">
                                    <p class="text-muted text-base font-normal">Yes, our platform includes a robust scheduling feature. You can create, assign, and manage employee shifts effortlessly. The system also sends reminders to employees about their upcoming shifts, ensuring smooth operations.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 3: Is the platform accessible on mobile and desktop? -->
                        <div class="relative overflow-hidden">
                            <h2 class="text-base font-semibold" id="accordion-collapse-heading-3">
                                <button type="button" class="flex justify-between items-center px-5 py-4 w-full font-semibold text-lg text-start" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                                    aria-controls="accordion-collapse-body-3">
                                    <span>Is the platform accessible on mobile and desktop?</span>
                                    <svg data-accordion-icon class="size-4 shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-3" class="hidden"
                                aria-labelledby="accordion-collapse-heading-3">
                                <div class="px-5 pb-5">
                                    <p class="text-muted text-base font-normal">Absolutely! Our platform is cloud-based and accessible on both mobile and desktop devices. You can manage attendance, schedules, and employee data from anywhere, at any time.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 4: How secure is the attendance data? -->
                        <div class="relative overflow-hidden">
                            <h2 class="text-base font-semibold" id="accordion-collapse-heading-4">
                                <button type="button" class="flex justify-between items-center px-5 py-4 w-full font-semibold text-lg text-start" data-accordion-target="#accordion-collapse-body-4" aria-expanded="false"
                                    aria-controls="accordion-collapse-body-4">
                                    <span>How secure is the attendance data?</span>
                                    <svg data-accordion-icon class="size-4 shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-4" class="hidden"
                                aria-labelledby="accordion-collapse-heading-4">
                                <div class="px-5 pb-5">
                                    <p class="text-muted text-base font-normal">We prioritize data security. All attendance and employee data are encrypted and stored securely in the cloud. Access is restricted to authorized personnel only, ensuring complete confidentiality.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 5: Can I generate reports for attendance and performance? -->
                        <div class="relative overflow-hidden">
                            <h2 class="text-base font-semibold" id="accordion-collapse-heading-5">
                                <button type="button" class="flex justify-between items-center px-5 py-4 w-full font-semibold text-lg text-start" data-accordion-target="#accordion-collapse-body-5" aria-expanded="false"
                                    aria-controls="accordion-collapse-body-5">
                                    <span>Can I generate reports for attendance and performance?</span>
                                    <svg data-accordion-icon class="size-4 shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-5" class="hidden"
                                aria-labelledby="accordion-collapse-heading-5">
                                <div class="px-5 pb-5">
                                    <p class="text-muted text-base font-normal">Yes, our platform provides automated reporting features. You can generate detailed reports on attendance, employee performance, and other key metrics. These reports can be exported for further analysis or sharing.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Faqs End -->

    <!-- Testimonial Start -->
    <section id="testimonial" class="md:py-20 py-10">
        <div class="container">
            <div class="">
                <div class="text-center max-w-xl mx-auto">
                    <span class="text-sm text-primary uppercase font-semibold tracking-wider text-default-950">Our Clients</span>
                    <h2 class="text-3xl md:text-4xl/tight font-semibold mt-4">Stories From Our Customers</h2>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 mt-14 items-center">
                <div class="relative">
                    <div class="swiper testi-swiper rounded-md relative px-1">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="p-6 rounded-xl border border-default-200">
                                    <h3 class="text-xl font-semibold text-default-950">No doubt, spend. in is the best!</h3>
                                    <p class="text-base font-normal mt-4 mb-4 text-muted">
                                        Without a doubt, Spend in stands out as the absolute best.Their exceptional
                                        quality, reliablity, and customer service are unmatched. I have complete....
                                    </p>
                                    <div class="flex items-center gap-4">
                                        <div>
                                            <img src="https://zoyothemes.com/tailwind/evea/assets/images/user/client-04.jpg" class="h-12 rounded-full"
                                                alt="">
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-primary">Moritika Kazuki</h3>
                                            <p class="text-sm font-medium mt-1">Finance Manager at Mangan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="p-6 rounded-xl border border-default-200">
                                    <h3 class="text-xl font-semibold text-default-950">It's just incredible!</h3>
                                    <p class="text-base font-normal mt-4 mb-4 text-muted">
                                        I am extremely delighated with the exceptional service provided by NioLand.
                                        Their expert support system, efficient tools, and strategic solutions have
                                        truly....
                                    </p>
                                    <div class="flex items-center gap-4">
                                        <div>
                                            <img src="https://zoyothemes.com/tailwind/evea/assets/images/user/client-05.jpg" class="h-12 rounded-full"
                                                alt="">
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-primary">Jimmy Bartney</h3>
                                            <p class="text-sm font-medium mt-1">Product Manager At Picko Lab</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="p-6 rounded-xl border border-default-200">
                                    <h3 class="text-xl font-semibold text-default-950">Satisfied user here!</h3>
                                    <p class="text-base font-normal mt-4 mb-4 text-muted">
                                        As a satisfied user, I can confidence say that my experience with NioLand has
                                        been outstanding. The service, support, and solutions provided have...
                                    </p>
                                    <div class="flex items-center gap-4">
                                        <div>
                                            <img src="https://zoyothemes.com/tailwind/evea/assets/images/user/client-07.jpg" class="h-12 rounded-full"
                                                alt="">
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-primary">Natasha Romanoff</h3>
                                            <p class="text-sm font-medium mt-1">Black Widow</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="p-6 rounded-xl border border-default-200">
                                    <h3 class="text-xl font-semibold text-default-950">Best service here!</h3>
                                    <p class="text-base font-normal mt-4 mb-4 text-muted">
                                        "I've tried many services, but none compare to the excellence provided here!
                                        From start to finish, the team has been attentive, professional, and committed
                                        to delivering the best results."
                                    </p>
                                    <div class="flex items-center gap-4">
                                        <div>
                                            <img src="https://zoyothemes.com/tailwind/evea/assets/images/user/client-03.jpg" class="h-12 rounded-full"
                                                alt="">
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-primary">Barbara McIntosh</h3>
                                            <p class="text-sm font-medium mt-1">Senior Software Developer</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-center gap-3 w-full relative mt-10">
                        <div class="testi-button-prev">
                            <div
                                class="h-11 w-11 rounded-full shadow border border-default-300 bg-default-100 text-default-900 hover:bg-primary hover:border-primary hover:text-white flex items-center justify-center transition-all duration-300">
                                <i data-lucide="chevron-left" class="h-6 w-6"></i>
                            </div>
                        </div>
                        <div class="testi-button-next">
                            <div
                                class="h-11 w-11 rounded-full shadow border border-default-300 bg-default-100 text-default-900 hover:bg-primary hover:border-primary hover:text-white flex items-center justify-center transition-all duration-300">
                                <i data-lucide="chevron-right" class="h-6 w-6"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial End -->

    <!-- Client Start -->
    <section class="md:py-20 py-10 bg-gray-50">
        <div class="container relative">
            <div class="">
                <div class="text-center max-w-xl mx-auto">
                    <h3 class="text-3xl md:text-4xl/tight font-semibold">Trusted by Leading Companies</h3>
                </div>
            </div>

            <div class="grid md:grid-cols-6 grid-cols-2 justify-center gap-[30px] mt-14">
                <div class="mx-auto py-4">
                    <img src="{{asset('asset/images/client/amazon.svg')}}" class="h-10" alt="">
                </div>

                <div class="mx-auto py-4">
                    <img src="{{asset('asset/images/client/google.svg')}}" class="h-10" alt="">
                </div>

                <div class="mx-auto py-4">
                    <img src="{{asset('asset/images/client/lenovo.svg')}}" class="h-10" alt="">
                </div>

                <div class="mx-auto py-4">
                    <img src="{{asset('asset/images/client/paypal.svg')}}" class="h-10" alt="">
                </div>

                <div class="mx-auto py-4">
                    <img src="{{asset('asset/images/client/shopify.svg')}}" class="h-10" alt="">
                </div>

                <div class="mx-auto py-4">
                    <img src="{{asset('asset/images/client/spotify.svg')}}" class="h-10" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Client Start -->

    <!-- Blog Start -->
    <!-- <section id="blog" class="py-20">
        <div class="container">
            <div class="">
                <div class="text-center max-w-xl mx-auto">
                    <span class="text-sm text-primary uppercase font-semibold tracking-wider text-default-950">Blog</span>
                    <h2 class="text-3xl md:text-4xl/tight font-semibold mt-4">Check the latest news about our company in our blog.</h2>
                </div>
            </div>

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6 mt-14 items-center">
                <div class="bg-white rounded-xl border">
                    <div class="relative">
                        <img class="rounded-t-xl" src="{{asset('')}}asset/images/blog/05.jpg" alt="">
                    </div>
                    <div class="flex py-6 px-6">
                        <div>
                            <a href="#" class="text-xl text-black font-semibold line-clamp-2">Spotlight — Equinox Collection by Shane Griffin</a>
                            <p class="mt-4 mb-6 text-gray-500 leading-6">As I searched for inspiration to
                                get started, I came across the captivating creations of Shane Griffin, an artist and
                                director located in New York City...</p>

                            <div class="flex items-center justify-between gap-3 mt-4">
                                <div class="flex items-center">
                                    <img src="{{asset('')}}asset/images/user/client-05.jpg" class="h-10 w-10 me-4 rounded-full" alt="">
                                    <a href="#" class="text-black text-sm font-semibold pb-1 hover:underline hover:text-primary transition-all duration-300"> Credon catla</a>
                                </div>
                                <p class="flex font-medium text-muted">August 2</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl border">
                    <div class="relative">
                        <img class="rounded-t-xl" src="{{asset('')}}asset/images/blog/07.jpg" alt="">
                    </div>
                    <div class="flex py-6 px-6">
                        <div>
                            <a href="#" class="text-xl text-black font-semibold line-clamp-2">Random Explorations with Cinema 4D and Redshift</a>
                            <p class="mt-4 mb-6 text-gray-500 leading-6">As I searched for inspiration to
                                get started, I came across the captivating creations of Shane Griffin, an artist and
                                director located in New York City...</p>

                            <div class="flex items-center justify-between gap-3 mt-4">
                                <div class="flex items-center">
                                    <img src="{{asset('')}}asset/images/user/client-03.jpg" class="h-10 w-10 me-4 rounded-full" alt="">
                                    <a href="#" class="text-black text-sm font-semibold pb-1 hover:underline hover:text-primary transition-all duration-300"> Jessica Smith</a>
                                </div>
                                <p class="flex font-medium text-muted">August 3</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl border">
                    <div class="relative">
                        <img class="rounded-t-xl" src="{{asset('')}}asset/images/blog/04.jpg" alt="">
                    </div>
                    <div class="flex py-6 px-6">
                        <div>
                            <a href="#" class="text-xl text-black font-semibold line-clamp-2">Step by step guide for conducting usability</a>
                            <p class="mt-4 mb-6 text-gray-500 leading-6">As I searched for inspiration to
                                get started, I came across the captivating creations of Shane Griffin, an artist and
                                director located in New York City...</p>

                            <div class="flex items-center justify-between gap-3 mt-4">
                                <div class="flex items-center">
                                    <img src="{{asset('')}}asset/images/user/client-03.jpg" class="h-10 w-10 me-4 rounded-full" alt="">
                                    <a href="#" class="text-black text-sm font-semibold pb-1 hover:underline hover:text-primary transition-all duration-300"> Petric Camp</a>
                                </div>
                                <p class="flex font-medium text-muted">August 8</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Blog End -->

    <!-- Contact Start -->
    <section id="contact" class="md:py-20 py-10 bg-gray-50">
        <div class="container">
            <div class="grid lg:grid-cols-3 gap-6 items-center">
                <div>
                    <div>
                        <span class="text-sm text-primary uppercase font-semibold tracking-wider text-default-950 mb-6">Contact Us</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl/tight font-semibold mt-4">We're open to talk to good people.</h2>

                    <!-- <div class="flex flex-col sm:flex-row items-center gap-5 text-center sm:text-start mt-10">
                        <div class="h-12 w-12 rounded-full bg-primary/10 flex items-center justify-center">
                            <i data-lucide="map-pin" class="text-2xl text-primary"></i>
                        </div>
                        <div>
                            <h5 class="text-base text-muted font-medium mb-1">123 King Street, London W60 10250</h5>
                            <a href="#" class="text-xs text-primary font-bold uppercase">See more</a>
                        </div>
                    </div> -->

                    <div class="flex flex-col sm:flex-row items-center gap-5 text-center sm:text-start mt-10">
                        <div class="h-12 w-12 rounded-full bg-primary/10 flex items-center justify-center">
                            <i data-lucide="mail" class="text-2xl text-primary"></i>
                        </div>
                        <div>
                            <h5 class="text-base text-muted font-medium mb-1">support@lockmytimes.com</h5>
                            <a href="mailto:support@lockmytimes.com" class="text-xs text-primary font-bold uppercase cursor-pointer">Say hello</a>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row items-center gap-5 text-center sm:text-start mt-10">
                        <div class="h-12 w-12 rounded-full bg-primary/10 flex items-center justify-center">
                            <i data-lucide="smartphone" class="text-2xl text-primary"></i>
                        </div>
                        <div>
                            <h5 class="text-base text-muted font-medium mb-1">(+1) 123 456 78900</h5>
                            <a href="tel:+123456789" class="text-xs text-primary font-bold uppercase">call now</a>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 lg:ms-24">
                    <div class="p-6 md:p-12 rounded-md shadow-lg bg-white">
                        <form>
                            <div class="grid sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="formFirstName" class="block text-sm/normal font-semibold text-black mb-2">First Name</label>
                                    <input type="text" class="block w-full text-sm rounded-md py-3 px-4 border-gray-200 focus:border-gray-300 focus:ring-transparent" id="formFirstName" placeholder="Your first name..." required="">
                                </div>

                                <div>
                                    <label for="formLastName" class="block text-sm/normal font-semibold text-black mb-2">Last Name</label>
                                    <input type="text" class="block w-full text-sm rounded-md py-3 px-4 border-gray-200 focus:border-gray-300 focus:ring-transparent" id="formLastName" placeholder="Last first name..." required="">
                                </div>

                                <div>
                                    <label for="formEmail" class="block text-sm/normal font-semibold text-black mb-2">Email Address</label>
                                    <input type="email" class="block w-full text-sm rounded-md py-3 px-4 border-gray-200 focus:border-gray-300 focus:ring-transparent" id="formEmail" placeholder="Your email..." required="">
                                </div>

                                <div>
                                    <label for="formPhone" class="block text-sm/normal font-semibold text-black mb-2">Phone Number</label>
                                    <input type="text" class="block w-full text-sm rounded-md py-3 px-4 border-gray-200 focus:border-gray-300 focus:ring-transparent" id="formPhone" placeholder="Type phone number..." required="">
                                </div>

                                <div class="sm:col-span-2">
                                    <div class="mb-4">
                                        <label for="formMessages" class="block text-sm/normal font-semibold text-black mb-2">Messages</label>
                                        <textarea class="block w-full text-sm rounded-md py-3 px-4 border-gray-200 focus:border-gray-300 focus:ring-transparent" id="formMessages" rows="4" placeholder="Type messages..." required=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="py-2 px-6 rounded-md text-baseitems-center justify-center border border-primary text-white bg-primary hover:bg-primaryDark transition-all duration-500 font-medium">Send Messages <i class="mdi mdi-send ms-1"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact End -->

    <!-- Footer Start -->
    <footer class="bg-[#17243A]">
      <div class="container">
        <div
          class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6 pb-16 pt-16"
        >
          <div class="col-span-full lg:col-span-2">
            <div class="max-w-2xl mx-auto">
              <div class="flex items-center">
                <a href="#" class="flex items-center">
                  <i data-lucide="qr-code" class="size-8 text-primary"></i>
                  <span class="text-2xl font-bold text-primary ms-2"
                    >Lock My Times</span
                  >
                </a>
              </div>
              <p class="text-gray-300 max-w-xs mt-6">
                One Solution for your Employee Management System.
              </p>
            </div>

            <div class="mt-6 grid space-y-3">
              <a
                class="inline-flex items-center gap-x-4 text-gray-300 hover:text-gray-400 transition-all duration-300"
                href="mailto:info@lockmytimes.com"
              >
                <i
                  data-lucide="mail"
                  class="h-5 w-5 text-gray-300 hover:text-gray-400"
                ></i>

                info@lockmytimes.com
              </a>

              <a
                class="inline-flex items-center gap-x-4 text-gray-300 hover:text-gray-400 transition-all duration-300"
                href="tel:(+1) 123 456 7890"
              >
                <i
                  data-lucide="phone"
                  class="h-5 w-5 text-gray-300 hover:text-gray-400"
                ></i>
                (+1) 123 456 7890
              </a>
            </div>
          </div>

          <div class="col-span-1">
            <h4 class="font-semibold text-gray-100 uppercase">Company</h4>

            <div class="mt-6 grid space-y-3">
              <p>
                <a
                  class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300"
                  href="#about"
                  >About Us</a
                >
              </p>
              <p>
                <a
                  class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300"
                  href="#features"
                  >Features</a
                >
              </p>
              <p>
                <a
                  class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300"
                  href="#services"
                  >Services</a
                >
              </p>

              <p>
                <a
                  class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300"
                  href="#"
                  >Contact</a
                >
              </p>
            </div>
          </div>

          <div class="col-span-1">
            <h4 class="font-semibold text-gray-100 uppercase">Product</h4>

            <div class="mt-6 grid space-y-3">
              <p>
                <a
                  class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300"
                  href="#services"
                  >Services</a
                >
              </p>
              <p>
                <a
                  class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300"
                  href="#about"
                  >About Us</a
                >
              </p>
              <p>
                <a
                  class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300"
                  href="#features"
                  >Features</a
                >
              </p>
              <p>
                <a
                  class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300"
                  href="#FAQs"
                  >FAQs</a
                >
              </p>
            </div>
          </div>

          <div class="col-span-1">
            <h4 class="font-semibold text-gray-100 uppercase">Important Links</h4>

            <div class="mt-6 grid space-y-3">
              <p>
                <a
                  class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300"
                  href="#"
                  >Our Journeys</a
                >
              </p>
              <p>
                <a
                  class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300"
                  href="#about"
                  >Roadmap</a
                >
              </p>
              <p>
                <a
                  class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300"
                  href="#pricing"
                  >Pricing Plans</a
                >
              </p>
              <p>
                <a
                  class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300"
                  href="#"
                  >Privacy Policy
                </a>
              </p>
              <p>
                <a
                  class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300"
                  href="#"
                  >Terms & Conditions</a
                >
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="py-4 bg-[#1C2940]">
        <!-- 1B283F -->
        <div class="container">
          <div
            class="flex flex-wrap md:justify-between justify-center items-center"
          >
            <p class="text-base text-white">
              © Lock My Times
              <script>
                document.write(new Date().getFullYear());
              </script>
              All Rights Reserved.
            </p>

            <div class="flex items-center gap-4 mt-4 md:mt-0">
              <i
                data-lucide="facebook"
                class="h-5 w-5 text-white hover:text-primary"
              ></i>
              <i
                data-lucide="instagram"
                class="h-5 w-5 text-white hover:text-primary"
              ></i>
              <i
                data-lucide="twitter"
                class="h-5 w-5 text-white hover:text-primary"
              ></i>
              <i
                data-lucide="youtube"
                class="h-5 w-5 text-white hover:text-primary"
              ></i>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer End -->


    
    <!-- Preline Js -->
    <script src="{{asset('asset/libs/preline/preline.js')}}" ></script>

    <!-- Lucide Js -->
    <script src="{{asset('asset/libs/lucide/umd/lucide.min.js')}}"></script>

    <!-- Gumshoe Js -->
    <script src="{{asset('asset/libs/gumshoejs/gumshoe.polyfills.min.js')}}"></script>

    <!-- Jarallax Js -->
    <script src="{{asset('asset/libs/jarallax/jarallax.min.js')}}"></script>

    <!-- Swiper Bundle Js -->
    <script src="{{asset('asset/libs/swiper/swiper-bundle.min.js')}}"></script>

    <!-- Swiper Js -->
    <script src="{{asset('asset/js/swiper.js')}}"></script>

    <!-- Main App Js -->
    <script src="{{asset('asset/js/app.js')}}" ></script>

    </body>
</html>