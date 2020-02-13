<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Domoter
The software aims to make the configuration totally customizable. It is in fact possible to define your own applications for the control of some types of devices in all simplicity.

Among the main elements of the application we have:

- User and home automation device authentication;
- Creation of an IoT gateway for efficient communication;
- Creation of applications;
- Creation of profile devices and insertion of new devices;

### Domoter

- Each user of the platform has the possibility to login for each registered user, but the procedure for registering new users is accessible only by the administrator and this carries out authentication.
- The gateway is considered as an entry point from a completely different network: it is a physical device or a program software that passes through a connection point between the cloud and controller, sensors and smart devices. 
A gateway provides a place to pre-provide data locally before sending it to the cloud. In the project, a Raspberry Pi 3B + was used as a gateway device which uses its own WiFi access point to connect to controlled devices. 
The device that works as a gateway records the information for MQTT communication, a publish/subscriber communication protocol based on the exchange of messages between two clients through an MQTT server that acts as a messaging broker.
- The applications, on the other hand, can be modulated on specific types of devices and can activate controlled commands based on the functions associated with the device-profile, device profile which includes the information that the device expects and can communicate.
- To add a new device to the application, simply enter an identification name and the device will be added to the index of registered devices with precise application and operation. For a device to be active and functional, it is necessary to authenticate. Immediately after its creation, it will be possible to exchange a token between the latter and the application itself: in this way, each device can be activated with an activation token which takes place for communication.
- The experimental tests were used in a python script with the use of the Paho MQTT Python Client library and with an ad hoc firmware for the use of a Sonoff device of the ITEAD line.
- The app is also available in the cloud version, DomoterCloud and operation is based on that of the local platform, Domoter, with the difference that for assistance a first authentication as a gateway is required by receiving a token for the authentication and authorization of functionalities.

## Get project

git clone https://github.com/barbiezz/Domoter.git

## Dependencies

- COMPOSER
- XAMPP (Apache & Mysql)
- PHP

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1400 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
