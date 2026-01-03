# Database Documentation

This document provides a detailed overview of the database schema used in the Index Manager application.

## Database Name

The name of the database used in this project is `playersdb`.

## Table Name

The primary table used in this application is `players`.

### `players` Table Schema

The `players` table stores all the information about the job applicants.

| Column        | Type         | Description                                         |
|---------------|--------------|-----------------------------------------------------|
| `id`          | `int(11)`    | The primary key for the table (auto-incremented).   |
| `pname`       | `varchar(255)`| The full name of the applicant.                      |
| `occupation`  | `varchar(255)`| The applicant's occupation.                         |
| `gender`      | `varchar(255)`| The gender of the applicant.                        |
| `email`       | `varchar(255)`| The email address of the applicant.                 |
| `phone`       | `varchar(255)`| The phone number of the applicant.                  |
| `address`     | `varchar(255)`| The street address of the applicant.                |
| `city`        | `varchar(255)`| The city of residence of the applicant.             |
| `zipcode`     | `varchar(255)`| The zip code of the applicant.                      |
| `birthdate`   | `date`       | The applicant's date of birth.                      |
| `civilstatus` | `varchar(255)`| The civil status of the applicant.                  |
| `citizenship` | `varchar(255)`| The citizenship of the applicant.                   |
| `religion`    | `varchar(255)`| The religion of the applicant.                      |
| `sssidno`     | `varchar(255)`| The SSS ID number of the applicant.                 |
| `umidno`      | `varchar(255)`| The UMID number of the applicant.                   |
| `gsis`        | `varchar(255)`| The GSIS number of the applicant.                   |
| `pagibig`     | `varchar(255)`| The Pag-ibig ID number of the applicant.            |
| `philhealth`  | `varchar(255)`| The Philhealth number of the applicant.             |
| `date`        | `date`       | The date the application was submitted.             |
| `photo`       | `varchar(255)`| The filename of the applicant's photo.              |
| `document`    | `varchar(255)`| The filename of the applicant's PDF document.       |

### SQL `CREATE TABLE` Statement

Here is the SQL statement to create the `players` table:

```sql
CREATE TABLE `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `civilstatus` varchar(255) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `sssidno` varchar(255) NOT NULL,
  `umidno` varchar(255) NOT NULL,
  `gsis` varchar(255) NOT NULL,
  `pagibig` varchar(255) NOT NULL,
  `philhealth` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `photo` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```
