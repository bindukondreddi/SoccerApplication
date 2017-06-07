package soccer;

import org.junit.Assert;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

public class Bug2 {

	public static void main(String[] args) {
		System.setProperty("webdriver.chrome.driver", "C:\\Users\\kiran\\Desktop\\Selenium\\servers\\chromedriver.exe");
		WebDriver driver=new ChromeDriver();
		driver.get("http://localhost/soccer/");
		
		
		 String s6 = driver.findElement(By.cssSelector(".panel-title")).getText();
	     System.out.println(s6);
		 driver.findElement(By.xpath(".//*[@id='accordian']/div[1]/div[1]/h4")).click();
		 driver.findElement(By.xpath(".//*[@id='sportswear']/div/ul/li[1]/a")).click();
		 driver.findElement(By.xpath("html/body/section[2]/div/div/div[2]/div[1]/div[1]/div/div/div/div/h2")).click();
		 System.out.println("NIKE");
		 String s4 = driver.findElement(By.cssSelector(".item_name>a")).getText();
	        System.out.println(s4);
		
         System.out.println(s6);
               
         System.out.println("ADIDAS");
         driver.findElement(By.xpath(".//*[@id='sportswear']/div/ul/li[3]/a")).click();
         
         Assert.assertEquals ("Chelsea Home Men's Jersey (M)", driver.findElement(By.cssSelector(".item_name>a")).getText());
		 
         System.out.println(s6);
         System.out.println("PUMA");
         driver.findElement(By.xpath(".//*[@id='sportswear']/div/ul/li[4]/a")).click();
         Assert.assertEquals ("Arsenal Alternate Men's Jersey (L)", driver.findElement(By.cssSelector(".item_name>a")).getText());
      
         
        
	}

}
