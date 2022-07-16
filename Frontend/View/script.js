function generate() {
    var doc = new jsPDF('p', 'pt', 'letter');
    var htmlstring = '';
    var tempVarToCheckPageHeight = 0;
    var pageHeight = 0;
    pageHeight = doc.internal.pageSize.height;
    specialElementHandlers = {
        // element with id of "bypass" - jQuery style selector  
        '#bypassme': function (element, renderer) {
            // true = "handled elsewhere, bypass text extraction"  
            return true
        }
    };
    margins = {
        top: 150,
        bottom: 60,
        left: 40,
        right: 40,
        width: 600
    };
    var y = 20;
    doc.setLineWidth(2);
    doc.text(200, y = y + 30, "Placing Order Details");
    doc.autoTable({
        html: '.table',
        startY: 70,
        theme: 'grid',
        columnStyles: {
            0: {
                cellWidth: 90,
            },
            1: {
                cellWidth: 90,
            },
            2: {
                cellWidth: 90,
            }
            
        },
        styles: {
            minCellHeight: 40
        }
    })
    doc.save('Placing_order_details.pdf');
}