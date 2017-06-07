package soccer;

import org.junit.Assert;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

public class Bug3 {

	public static void main(String[] args) {
		System.setProperty("webdriver.chrome.driver", "C:\\Users\\kiran\\Desktop\\Selenium\\servers\\chromedriver.exe");
		WebDriver driver=new ChromeDriver();
		driver.get("http://localhost/soccer/");
		
		
		 String s7 = driver.findElement(By.cssSelector(".left-sidebar>h2")).getText();
	     System.out.println(s7);
	     
		 String s6 = driver.findElement(By.xpath(".//*[@id='accordian']/div[2]/div[1]/h4")).getText();
	     
		 
		 System.out.println(s6);
		 driver.findElement(By.xpath(".//*[@id='accordian']/div[2]/div[1]/h4/a/span")).click();
		 driver.findElement(By.xpath(".//*[@id='mens']/div/ul/li[1]/a")).click();
	
		    
	         System.out.println("NIKE");
	         driver.findElement(By.xpath(".//*[@id='mens']/div/ul/li[3]/a")).click();
	         
	         String s4 = driver.findElement(By.cssSelector(".item_name>a")).getText();
	        
	         
	         System.out.println(s4); 
	         System.out.println(s6); 
	         System.out.println("PUMA");
	         
         Assert.assertEquals ("Arsenal Alternate Men's Jersey (L)", driver.findElement(By.cssSelector(".item_name>a")).getText());
         
        
         System.out.println(s6);
         System.out.println("ADIDAS");
        
         driver.findElement(By.xpath(".//*[@id='mens']/div/ul/li[2]/a")).click();
        
         Assert.assertEquals ("Chelsea Home Men's Jersey (M)", driver.findElement(By.cssSelector(".item_name>a")).getText());
 		
      
		
         
       
        
         
     
	

	}

}
