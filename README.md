# MemAdmin
This project is the End Assignment for the module PHP & MySQL, part of the Bachelor of Software Engineering program at LOI Hogeschool.

The application is a membership administration system (Ledenadministratie) designed for associations or clubs that manage families and calculate yearly contribution fees. It allows secretaries to maintain family and member data, and treasurers to determine contribution fees based on member types and ages.

## Features
- Overview of all families and their total contribution
- Full CRUD operations for:
    - Families
    - Family members
    - Member types
    - Contributions
    - Fiscal Years
- Contribution calculation based on age of the member
- Role-based login system
- Secure form handling using prepared statements
- MVC architecture using Laravel

## Optimizations
This project uses industry-standard design patterns to improve the **scalability, maintainability, and testability** of the application. The patterns are categorized as follows:

### **🏛 Architectural Patterns**

#### **Dependency Injection**
**Used in:** Controllers & Services  

**Purpose:**  
- Decouples components by injecting dependencies.  
- Improves testability by allowing mocks.

#### **Service Pattern**
**Used in:** Business Logic Layer  

**Purpose:**  
- Keeps controllers thin by moving business logic into services.  
- Improves code reusability across different parts of the application.

### **🛠 Creational Patterns**

#### **Singleton Pattern**
**Used in:** Database Connection Manager  

**Purpose:**  
- Ensures only one database connection instance is created.  
- Improves performance by reusing the connection.

### **🏗 Structural Patterns**

#### **Repository Pattern**
**Used in:** Data Access Layer  

**Purpose:**  
- Decouples business logic from database access.  
- Allows switching between **Eloquent, raw SQL, or PDO** without modifying core logic.

### **Behavioral Patterns**

#### **Template Method**
**Used in:** Base Controller

**Purpose:**
- Defines common CRUD workflow in an abstract controller.
- Child controllers override or extend only specific parts.

#### **Chain of Responsibility**
**Used in:** Middleware

**Purpose:**
- Processes HTTP requests through a sequence of middleware handlers.
- Each handler decides whether to pass the request to the next one.

#### **Factory Pattern**
**Used in:** Model Factories

**Purpose:**
- Generates test data for models with consistent defaults.

#### **View Composer**
**Used in:** ViewServiceProvider

**Purpose:**
- Injects common data into views when they are rendered.

## License

[MIT](https://choosealicense.com/licenses/mit/)
