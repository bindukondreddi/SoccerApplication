package soccer;

import org.junit.Assert;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

public class Bug5 {

	public static void main(String[] args) {
		System.setProperty("webdriver.chrome.driver", "C:\\Users\\kiran\\Desktop\\Selenium\\servers\\chromedriver.exe");
		WebDriver driver=new ChromeDriver();
		driver.get("http://localhost/soccer/");
		
		String s1 = driver.findElement(By.xpath("html/body/section[2]/div/div/div[1]/div/div[2]/h2")).getText();
	     System.out.println(s1);

	     System.out.println("Count");
		 String s2 = driver.findElement(By.xpath("html/body/section[2]/div/div/div[1]/div/div[2]/div/ul/li[1]/a")).getText();
	     System.out.println(s2);
	     driver.findElement(By.xpath("html/body/section[2]/div/div/div[1]/div/div[2]/div/ul/li[1]/a")).click();
	     Assert.assertEquals ("3", driver.findElements(By.cssSelector(".item_name>a")).size());
	     
	     
	     System.out.println("Count");
	     String s3 = driver.findElement(By.xpath("html/body/section[2]/div/div/div[1]/div/div[2]/div/ul/li[2]/a")).getText();
	     System.out.println(s3);
	     driver.findElement(By.xpath("html/body/section[2]/div/div/div[1]/div/div[2]/div/ul/li[2]/a")).click();
	     System.out.println("total number of items present in the page");
	     Assert.assertEquals ("3", driver.findElements(By.cssSelector(".item_name>a")).size());
	     
	     System.out.println("Count");
	     String s4 = driver.findElement(By.xpath("html/body/section[2]/div/div/div[1]/div/div[2]/div/ul/li[3]/a")).getText();
	     System.out.println(s4);
	     driver.findElement(By.xpath("html/body/section[2]/div/div/div[1]/div/div[2]/div/ul/li[3]/a")).click();
	     System.out.println("total number of items present in the page");
	     Assert.assertEquals ("1", driver.findElements(By.cssSelector(".item_name>a")).size());
	     
	     System.out.println("Count");
	     String s5 = driver.findElement(By.xpath("html/body/section[2]/div/div/div[1]/div/div[2]/div/ul/li[4]/a")).getText();
	     System.out.println(s5);
	     driver.findElement(By.xpath("html/body/section[2]/div/div/div[1]/div/div[2]/div/ul/li[4]/a")).click();
	     System.out.println("total number of items present in the page");
	     Assert.assertEquals ("1", driver.findElements(By.cssSelector(".item_name>a")).size());
	     
	     
	}

}
