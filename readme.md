# Hotel Solis Lacus

## Prerequisites

- The `gd` extension must be enabled in the `php.ini` file to use the image upload functions.

## Database Access

- **Host**: `localhost`
- **User**: `bif1user`
- **Password**: `LacusSolis123`
- **Database**: `solislacus`

## Predefined Accounts

The database already contains a user account and an admin account:

- **User Account**: 
  - Username: `testuser`
  - Password: `123`
  
- **Admin Account**:
  - Username: `admin`
  - Password: `123`

## Permissions

### Guest Permissions

A guest on the website has the following permissions:

- Read news posts
- Create an account
- Access the following pages:
  - Index
  - FAQs
  - Room overview
  - Information
  - Imprint

### User Permissions

A registered user on the website has the following permissions:

- Read news posts
- View personal user data
- Modify personal user data
- Make bookings
- View personal bookings
- Access all pages on the website

### Administrator Permissions

An administrator on the website has the following permissions:

- Read and create news posts
- View and modify user data for all users
- Deactivate users
- View all bookings and sort them by status
- Change the status of bookings
