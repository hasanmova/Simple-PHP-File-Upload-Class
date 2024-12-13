```markdown
# Simple PHP File Upload Class

This repository contains a lightweight and powerful PHP class for handling file uploads on the server. The class makes it easy to manage and upload files with high security and flexibility.

---

## Features
- Support for multiple file types (e.g., images, documents).
- Restrict file size to avoid large uploads.
- Validate file formats for added security.
- Configure file storage directory.
- Error handling with meaningful messages.

---

## Installation
1. **Clone the repository** or download the class file:
   ```bash
   git clone https://github.com/hasanmova/upload.git
   ```
2. Include the class in your project:
   ```php
   require_once 'class-upload.php';
   ```

---

## Usage
1. Configure the class and upload a file:
   ```php
   $format= array( 'image/jpeg' => 30000000 , 'image/gif' => 800000 , 'image/png' => 400000 ) ; //all format allow upload

$up=new upload( $format , UP_PATH ) ;
$up->uploadfile($_FILES['file']);

 
   ```

---

## Requirements
- **PHP 7.0+**
- A server with file system access

---

## Roadmap
Planned features for future releases:
- **Multiple File Uploads:** Handle multiple files simultaneously.
- **Security Scanning:** Check files to prevent malicious uploads.
- **Cloud Integration:** Upload files to cloud storage like AWS S3 or Google Cloud.

---

## Contributing
Contributions are welcome! If you have ideas for improving this project or encounter any issues:
- Open an [Issue](https://github.com/hasanmova/upload/issues).
- Submit a [Pull Request](https://github.com/hasanmova/upload/pulls).

---

## Links
- **Live Demo:** (Add a link here if available)
- **GitHub Repository:** [https://github.com/hasanmova/upload](https://github.com/hasanmova/upload)

---

Feel free to connect with me if you have any questions or suggestions! 😊
```











