# 🌐 Web-based Job Vacancy Selection System for Officer

Developing a *web-based job vacancy selection system* for users in the role of officers using *PHP (Laravel Framework)* and *MySQL database*. The system aims to help manage job vacancy data and assist in the selection process for job seekers in a more structured, efficient, and automated manner.

---

## 📑 Table of Contents
1. [Project Overview](#project-overview)
2. [Requirements Analysis](#requirements-analysis)
   - [Problem Identification](#problem-identification)
   - [System Objectives](#system-objectives)
   - [Functional Requirements Specification](#functional-requirements-specification)
3. [System Design](#system-design)
4. [Implementation](#implementation)
5. [Testing](#testing)
6. [Tools & Libraries](#tools--libraries)
   
---

## 📌 Project Overview

This project is a *web-based application* that allows officers to manage job vacancy data, perform the selection process for job seekers, and monitor the status of vacancies more systematically and efficiently. The system provides a user-friendly interface and ensures a smooth flow of the job application and selection process.

---

## 📊 Requirements Analysis

### 1️⃣ Problem Identification
The process of managing and selecting job vacancies in companies is often still carried out manually or using simple, non-integrated systems. This leads to difficulties in monitoring job vacancies' status and tracking the selection process of job seekers. A web-based solution is required to streamline and automate these processes.

### 2️⃣ System Objectives
The system's objectives are:
- To enable officers to *add, **edit, and **delete* job vacancy data.
- To *categorize job vacancies* based on their status:  
  - *Active (1)* → Job can still be applied for, selection not yet started.  
  - *Selection Process (2)* → Job no longer open for applications, selection process in progress.  
  - *Closed (3)* → Job closed after selection is completed, no further applications accepted.
- To *view job seekers* who have applied for each job vacancy.
- To support *administrative selection* and *interview selection* processes.
- To *automatically update job vacancy statuses* and the *closing date* when the selection process is completed.

### 3️⃣ Functional Requirements Specification

#### 📌 Job Vacancy Data Management
- *Add* new job vacancy data.
- *Edit* existing job vacancy data.
- *Delete* job vacancy data.
- *View* job vacancies, categorized by their status:  
  - Active, Selection Process, Closed.

#### 📌 View Job Vacancy Details
- *Display detailed job vacancy* information.
- *View job seekers* who have applied for the vacancy.
- *Track the selection progress* for each applicant.

#### 📌 Administrative Selection
- *Select job seekers* who pass the administrative stage.

#### 📌 Interview Selection
- *Select job seekers* who pass the interview stage from the pool of applicants who passed the administrative selection.
- Once interview selection is complete, the system will *update the closing date* (tgl_tutup) of the job vacancy.

---

## 📐 System Design

### *1. Use Case Diagram*
A *Use Case Diagram* will be designed to represent the interactions between the users (officers) and the system. It will show how the officer will interact with the system for managing job vacancies and performing the selection processes.

### *2. Sequence Diagram*
A *Sequence Diagram* will illustrate the sequence of operations and messages exchanged between objects in the system during specific processes like adding a job vacancy, applying for jobs, and conducting selections.

### *3. Database Design*
The system will utilize *MySQL* as the database. The schema will consist of tables to store job vacancy data, applicant information, selection process status, and interview results. An *Entity Relationship Diagram (ERD)* will be developed for better visualization of the relationships between entities.

### *4. User Interface Design*
The system will feature a *web-based interface* designed for ease of use by the officers. The interface will include forms for adding/editing job vacancies, viewing applicants, and performing selection tasks.

---

## ⚙ Implementation

The web-based job vacancy selection system was implemented using the following technologies:
- *Backend*: PHP (Laravel Framework)
- *Frontend*: HTML, CSS, JavaScript
- *Database*: MySQL
- *Server*: XAMPP (for local development) or any suitable web server for production

The system includes:
- A *dashboard* to view job vacancies and selection statuses.
- *Forms* to add, edit, and delete vacancies.
- *Selection workflows* for administrative and interview selections.

---

## 🧪 Testing

- *Blackbox Testing* was performed to ensure that the system functions according to the requirements without needing to know the internal workings of the system.
- *Functional Testing* to verify each feature works as expected, from data entry to application submission.

---

## 🛠 Tools & Libraries

The system is developed using the following tools and libraries:

- *Visual Studio Code* - Code editor for development.
- *XAMPP 3.3.0* - Local server environment for running PHP and MySQL.
- *PHP 8.0.2* - Programming language used for backend development.
- *Laravel 9.19* - PHP framework for building the application.
- *MySQL* - Database for storing data.
- *MVC Architecture* - For organizing the system structure and separating concerns.
