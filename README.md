## About MemAdmin

This project is built as an end-assignment for my bachelor's study in Software Engineering. It uses industry-standard design patterns to improve the **scalability, maintainability, and testability** of the application. The patterns are categorized as follows:

---

### **🏛 Architectural Patterns**

#### **Dependency Injection**
**Used in:** Controllers & Services  

**Purpose:**  
- Decouples components by injecting dependencies instead of hardcoding.  
- Improves testability by allowing the injection of mocks.

#### **Service Pattern**
**Used in:** Business Logic Layer  

**Purpose:**  
- Keeps controllers thin by moving business logic into services.  
- Improves code reusability across different parts of the application.

---

### **🛠 Creational Patterns**

#### **Singleton Pattern**
**Used in:** Database Connection Manager  

**Purpose:**  
- Ensures only one database connection instance is created.  
- Improves performance by reusing the connection.

---

### **🏗 Structural Patterns**

#### **Repository Pattern**
**Used in:** Data Access Layer  

**Purpose:**  
- Decouples business logic from database access.  
- Allows switching between **Eloquent, raw SQL, or PDO** without modifying core logic.
