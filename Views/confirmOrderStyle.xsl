<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
        <html>
            <head>
                <meta charset="UTF-8"/>
                <title>Glory Florist : Confirm Order</title>
                <link rel="stylesheet" href="CSS/confirmOrder.css"/>
            </head>
    
            <body>

            <form id='container'>

                <div id='hotbar'>
                  <a href='home.php' id='glory'>glory florist</a>
                  <a href='#' class='link'>shop</a>
                  <a href='cart.php' class='link' id='currentLink'>cart</a>
                  <a href='#' class='link'>account</a>
                </div>

                <div id='top'>
                  <div id='text'>
                    <a href='cart.php' id='back'>back&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;to your&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;cart</a>
                    <a id='title'>Confirm Order</a>
                  </div>
                </div>

                <div id='content'>

                  <div id='left'>

                    <a class='heading'>Receipt</a>

                    <div id='receipt'>
                        
                        <xsl:for-each select="//items">
                            <div class='item'>
                                <a class='amount'><xsl:value-of select="quantity"/></a>
                                <a class='name' href='#'><xsl:value-of select="name"/></a>
                                <a class='price'>RM <xsl:value-of select="price"/></a>
                            </div>
                        </xsl:for-each>
                        
                      <!--<a class='amount'><?php echo $quantities[0];?></a> -->  
                      
                      <!--<div class='item'>
                        
                        <a class='amount'>1</a>
                        <a class='name' href='#'>White rose</a>
                        <a class='price'>$10.00</a>
                      </div>-->
                    </div>
                    
                    <xsl:for-each select="//totalPriceArr">
                        <a id='total'>Total: <span>RM <xsl:value-of select="price"/></span></a>
                    </xsl:for-each>

                  </div>

                  <div id='right'>

                    <a class='heading'>Payment details</a>
                    
                    <a href='create_order.php' id='order_button'>COMPLETE ORDER</a>

                  </div>

                </div>

              </form>

            </body>

        </html>
    </xsl:template>

</xsl:stylesheet>
