# PDFMergerBundle
Symfony bundle that integrates [tomsgu/pdf-merger](https://github.com/Tomsgu/PDFMerger).

# Installation
```bash
composer require tomsgu/pdf-merger-bundle
```

# Usage
```php
use Tomsgu\PdfMerger\PdfMerger;

class MergePdfs
{
    private $merger;
    
    public function __construct(PdfMerger $merger)
    {
        $this->merger = $merger;
    }
    
    public function mergePdfs()
    {
        $pdfCollection = new PdfCollection();
        $pdfCollection->addPdf('filename.pdf', PdfFile::ALL_PAGES, PdfFile::ORIENTATION_PORTRAIT);
        $pdfCollection->addPdf('filename2.pdf', '1-4,9', PdfFile::ORIENTATION_LANDSCAPE);
        $pdfCollection->addPdf('filename3.pdf');
      
        /**
         * Available modes: MODE_FILE, MODE_DOWNLOAD, MODE_STRING, MODE_BROWSER
         * Orientation: This is a fallback if the orientation wasn't specified when adding pdf.
         */
        $this->merger->merge($pdfCollection, 'output.pdf', PdfMerger::MODE_FILE, PdfFile::ORIENTATION_LANDSCAPE);
    }
}
```
