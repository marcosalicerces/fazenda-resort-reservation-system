# Fazenda Resort — Hotel Reservation System

A web-based hotel reservation prototype developed as the final project for the **D053 — Programming Languages and Web Development** training programme.

The project explores how web technologies, relational databases and business rules can be combined to solve a practical accommodation booking problem.

![Fazenda Resort Homepage](screenshots/Captura%20de%20tela%20de%202026-10-31%2000-53-06.png)

## Project Overview

Fazenda Resort is a hotel reservation application that allows visitors to explore accommodation options, search for available rooms and complete a booking process.

Beyond building a website, the project provided an opportunity to work with server-side programming, relational databases, input validation and reservation availability rules.

The main objective was to translate accommodation booking requirements into a functional web application using PHP and MySQL.

## Technologies

- **Frontend:** HTML5, CSS3, Bootstrap, JavaScript
- **Backend:** PHP
- **Database:** MySQL
- **Database Management:** phpMyAdmin

## Main Features

- Hotel homepage with accommodation and local attraction information
- Room listings with images, nightly rates and guest capacities
- Search by check-in date, check-out date and number of guests
- Room filtering based on guest capacity
- Availability checking against existing reservations
- Reservation duration calculation
- Booking summary with room information and total price
- Customer information form
- Customer and reservation registration in the database
- Reservation confirmation page
- Client-side and server-side input validation

## Reservation Workflow

The application follows a structured booking process:

1. The visitor selects their check-in and check-out dates and the number of guests.
2. The server validates the submitted information.
3. The application searches for rooms that meet the requested capacity.
4. Existing reservations are checked to identify unavailable rooms.
5. Available accommodation options are displayed.
6. The visitor selects a room.
7. The application calculates and displays the reservation price.
8. The visitor provides their personal information.
9. The application registers the customer and creates the reservation.
10. A confirmation message is displayed when the reservation is successfully saved.

### Reservation Processing

The reservation workflow is implemented using PHP and a MySQL relational database.

During the availability search, the system filters rooms according to guest capacity and checks existing reservations for overlapping dates.

After selecting a room, the customer is presented with a reservation summary and a form for entering personal information.

The confirmation handler inserts customer information into the database, retrieves the generated customer ID and creates a reservation associated with the selected room.

The application then displays a confirmation page when the reservation insertion succeeds, or an error message when it fails.

## Database Design

The relational database is organised around three main entities.

### Customers (`clientes`)

Stores customer identification and contact information, including:

- Customer ID
- Name
- Email
- Telephone
- Tax identification number (NIF)

### Rooms (`quartos`)

Stores information about the available accommodation units, including:

- Room ID
- Room number
- Accommodation type
- Price per night
- Guest capacity
- Description

### Reservations (`reservas`)

Connects customers and rooms, storing:

- Reservation ID
- Customer ID
- Room ID
- Check-in date
- Check-out date
- Number of guests
- Total reservation price

Each reservation references a customer and a selected room through their respective identifiers.

## Business Logic

The application implements business rules to support the reservation process.

### Room Capacity

Only rooms capable of accommodating the requested number of guests are considered during the availability search.

### Date Validation

The server rejects invalid date ranges, including:

- Check-in dates earlier than the current date
- Check-out dates equal to the check-in date
- Check-out dates earlier than the check-in date

### Overlapping Reservations

The application checks existing reservations using the following SQL condition:

```sql
requested_checkin < existing_checkout
AND requested_checkout > existing_checkin
```

This condition identifies overlapping date ranges while allowing a new reservation to begin on the check-out date of an existing reservation.

### Reservation Duration

The application calculates the number of nights using PHP's `DateTime` functionality.

### Input Validation

JavaScript provides client-side validation and immediate feedback to users.

PHP performs server-side checks to validate submitted information independently of browser validation.

## Screenshots

The following screenshots demonstrate the application's interface and booking workflow.

### Homepage

![Homepage](screenshots/Captura%20de%20tela%20de%202026-10-31%2000-53-06.png)

Additional screenshots are available in the `screenshots/` directory, covering:

- Accommodation categories
- Local attractions
- Available rooms
- Reservation summary
- Customer information form
- Database structure

## Getting Started

### Requirements

To run this project locally, you will need:

- PHP
- MySQL
- A web browser
- A local development environment with the PHP MySQLi extension enabled

### Installation

**1. Clone the repository**

```bash
git clone https://github.com/marcosalicerces/fazenda-resort-reservation-system.git
```

**2. Navigate to the project directory**

```bash
cd fazenda-resort-reservation-system
```

**3. Configure the database**

Create or import the `fazenda_resort` database using the SQL file provided:

`fazenda_resort.sql`

You can import the database using phpMyAdmin or a MySQL client.

**4. Configure the database connection**

Copy the example configuration file:

```bash
cp conexao.example.php conexao.php
```

Edit `conexao.php` and provide your local database credentials.

The real configuration file is excluded from version control through `.gitignore`.

**5. Start the PHP development server**

From the project directory, run:

```bash
php -S localhost:8000
```

**6. Open the application**

Visit:

http://localhost:8000

The PHP built-in server is intended for local development and testing, not production deployment.

## Project Status

**Academic prototype — initial version completed.**

The project was developed as part of my technical training and is now serving as a foundation for further learning in software engineering, requirements analysis and domain modelling.

Although the initial reservation workflow has been implemented, the application still has technical limitations that would need to be addressed before production use.

## Current Technical Limitations

The following areas require further improvement:

- **SQL Security:** Replace dynamically constructed SQL queries with prepared statements.
- **Price Validation:** Recalculate reservation prices on the server instead of trusting values submitted through forms.
- **Reservation Consistency:** Revalidate room availability during confirmation and prevent concurrent bookings of the same room.
- **Database Transactions:** Ensure customer and reservation records are created consistently.
- **Output Security:** Improve HTML escaping and error handling.

These limitations have been identified as part of the project's technical review and ongoing development.

## Planned Improvements

Future development will focus on:

- Strengthening backend validation and database security
- Improving reservation consistency and concurrent booking handling
- Refactoring the application to improve separation of responsibilities
- Expanding the reservation prototype into a more complete accommodation management system
- Developing more comprehensive business rules for accommodation operations
- Improving maintainability and documentation

## What I Learned

This project helped me move beyond isolated programming exercises and begin thinking about software as a solution to a real-world problem.

I gained practical experience in connecting frontend interfaces to PHP application logic, working with relational databases and translating accommodation requirements into programming conditions.

One of the most important lessons was understanding that software development involves more than writing code. It requires identifying a problem, understanding its domain, defining rules and designing a solution that responds to real requirements.

The project also highlighted the importance of validation, data consistency, security and maintainability — areas I intend to continue developing as I progress in software engineering.

---

**Author:** [Amável Alicerces](https://github.com/marcosalicerces)

**Project:** D053 — Programming Languages and Web Development

**Year:** 2026