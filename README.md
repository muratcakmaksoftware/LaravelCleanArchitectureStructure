## Information
- Laravel Version: 8.77.1
- Laravel Installer Version: 4.2.9
- PHP Version : 7.3.27 ~ 7.4.27
- [Postman Document](https://documenter.getpostman.com/view/14752307/UVXqEYaK)

## Installation
- Clone project.
- php artisan migrate

## Design Patterns
- (EN) [Laravel Best Practices](https://github.com/alexeymezenin/laravel-best-practices) - (TR) [Laravel Best Practices](https://github.com/alexeymezenin/laravel-best-practices/blob/master/turkish.md)
- (EN) [Laravel Repository Pattern](https://asperbrothers.com/blog/implement-repository-pattern-in-laravel/) - (TR) [Laravel Repository Pattern](https://sosi.work/laravelde-repository-pattern-kullanimi)
- (EN) [SOLID Principles](https://www.digitalocean.com/community/conceptual_articles/s-o-l-i-d-the-first-five-principles-of-object-oriented-design) - (TR) [SOLID Principles](https://medium.com/bili%C5%9Fim-hareketi/solid-nedir-ne-de%C4%9Fildir-12c8bdfeda1c)

## Standards
- (EN) [PHP PSR STANDARTS](https://medium.com/solvup-tech/php-best-practices-with-psr-standards-d960498e1cd0) - (TR) [PHP PSR STANDARTS](https://umitarpat.medium.com/nedir-bu-php-psr-standartlar%C4%B1-psr-1-psr-2-psr-3-6b7ebe55ba94)
- (EN) [HTTP STATUS CODE](https://en.wikipedia.org/wiki/List_of_HTTP_status_codes) - (TR) [HTTP STATUS CODE](https://tr.wikipedia.org/wiki/HTTP_durum_kodlar%C4%B1)  

## Packages
- [Laravel API Auth & Sanctum](https://laravel.com/docs/8.x/sanctum)
- [Laravel Enum](https://github.com/BenSampo/laravel-enum)

### Commands
- php artisan make:trait {name}
- php artisan make:interface {name}
- php artisan make:enum {name}

### Repository Design Pattern Commands
- php artisan make:service-controller {name}
- php artisan make:service {name}
- php artisan make:repository {name}
- php artisan make:repository-interface {name}
- **php artisan make:make:csri {name}**

### Utils
- [Postman Scripts](https://learning.postman.com/docs/writing-scripts/intro-to-scripts/)

### File Structure
```
|   |   `-- Group Name Folder
|   |       `-- Create Name Folder
|   |          |-- Create Name File.php
|   |   `-- Single Name Folder
|   |       |-- Create Name File.php

|   |-- Http
|   |   `-- Controllers
|   |       `-- Users <Group Name Folder>
|   |           `-- User <Create Name Folder>
|   |              |-- UserController.php <Create Name File.php>
|   |           `-- UserAddress 
|   |              |-- UserAddressController.php
|   | 
|   |        `-- Contact <Single Name Folder>
|   |           |-- ContactController.php <Create Name File.php>
```

```
|-- app
|   |-- Console
|   |   `-- Commands
|   |       `-- Creators
|   |          |-- RepositoryCreator.php
|   |          |-- TraitCreator.php
|   |          |-- ...
|   |       `-- Make
|   |          |-- CSRIMake.php
|   |       `-- Queue
|   |          |-- ...php
|   |       `-- Migrate
|   |          |-- ...php
|   |-- Enums
|   |   `-- Languages
|   |      `-- Users
|   |         `-- User
|   |            |-- UserLanguageFile.php
|   |-- Exceptions
|   |   |-- Handler.php
|   |
|   |-- Helpers
|   |   |-- helpers.php
|   |
|   |-- Http
|   |   `-- Controllers
|   |       `-- Users
|   |           `-- User 
|   |              |-- UserController.php
|   |           `-- UserAddress 
|   |              |-- UserAddressController.php
|   |        `-- Roles
|   |           `-- Role
|   |              |-- RoleController.php
|   |           `-- RoleUser 
|   |              |-- RoleUserController.php
|   |        `-- Pages
|   |           `-- Page
|   |              |-- PageController.php
|   |           `-- PageContent
|   |              |-- PageContentController.php
|   |        `-- Contact
|   |           |-- ContactController.php
|   |       |-- BaseController.php
|   |
|   |   `-- Middleware
|   |           |-- Authenticate.php //Unauthorized 
|   |
|   |   `-- Requests
|   |       `-- Auth
|   |           |-- LoginAuthRequest.php
|   |
|   |-- Models
|   |   `-- Users
|   |      `-- User
|   |           |-- User.php
|   |      `-- UserAddress
|   |           |-- UserAddress.php
|   |   `-- Roles
|   |      `-- Role
|   |           |-- Role.php
|   |      `-- RoleUser
|   |           |-- RoleUser.php
|   |   `-- Pages
|   |      `-- Page
|   |           |-- Page.php
|   |      `-- PageContent
|   |           |-- PageContent.php
|   |   `-- Contact
|   |      |-- Contact.php
|   |   |-- BaseModel.php
|   |
|   |-- Providers
|   |   |-- AppServiceProvider.php
|   |   |-- RepositoryServiceProvider.php
|   |
|   |-- Services
|   |    `-- Users
|   |       `-- User 
|   |          |-- UserService.php
|   |       `-- UserAddress 
|   |          |-- UserAddressService.php
|   |    `-- Roles
|   |       `-- Role
|   |          |-- RoleService.php
|   |       `-- RoleUser 
|   |          |-- RoleUserService.php
|   |    `-- Pages
|   |       `-- Page
|   |          |-- PageService.php
|   |       `-- PageContent
|   |          |-- PageContentService.php
|   |    `-- Contact
|   |       |-- ContactService.php
|   |   |-- BaseService.php
|   |
|   |-- Repositories
|   |    `-- Users
|   |       `-- User 
|   |          |-- UserRepository.php
|   |       `-- UserAddress 
|   |          |-- UserAddressRepository.php
|   |    `-- Roles
|   |       `-- Role
|   |          |-- RoleRepository.php
|   |       `-- RoleUser 
|   |          |-- RoleUserRepository.php
|   |    `-- Pages
|   |       `-- Page
|   |          |-- PageRepository.php
|   |       `-- PageContent
|   |          |-- PageContentRepository.php
|   |    `-- Contact
|   |       |-- ContactRepository.php
|   |   |-- BaseRepository.php
|   |
|   |-- Interfaces
|   |    `-- RepositoryInterfaces
|   |       `-- Users
|   |          `-- User 
|   |             |-- UserRepositoryInterface.php
|   |          `-- UserAddress 
|   |             |-- UserAddressRepositoryInterface.php
|   |       `-- Roles
|   |          `-- Role
|   |             |-- RoleRepositoryInterface.php
|   |          `-- RoleUser 
|   |             |-- RoleUserRepositoryInterface.php
|   |       `-- Pages
|   |          `-- Page
|   |             |-- PageRepositoryInterface.php
|   |          `-- PageContent
|   |             |-- PageContentRepositoryInterface.php
|   |       `-- Contact
|   |          |-- ContactRepositoryInterface.php
|   |       |-- BaseRepositoryInterface.php
|   |   |-- BaseInterface.php
|   |   
|   |-- Traits
|   |   |-- APIResponseTrait.php
|-- config
|-- routes
|   |-- api.php
|-- resources
|   `-- lang
|      `-- en
|          `-- users
|              `-- user
|                  |-- user.php
|      `-- tr
|          `-- users
|              `-- user
|                  |-- user.php

```

### Special naming conventions
| What      | How                                                                                                                                                                           |
|-----------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| Migration | create_tableName_table<br />add_columnName_to_tablename_table<br />update_columnName_to_tablename_table<br />remove_columnName_from_tablename_table<br />drop_tableName_table |
Test Commit
